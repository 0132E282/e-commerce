<?php

namespace App\Repository\RepositoryMain;

use App\Models\User;
use App\Repository\RepositoriesInterface\UserRepositoryInterface;
use App\Repository\RepositoryMain\BaseRepository;
use App\storage\StoreFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $modal;
    protected $store;
    function __construct()
    {
        $this->modal = new User();
        $this->store = (new StoreFactory)->initialize();
    }
    function create($value, $options = [])
    {
        if ($value->avatar_url) {
            $avatar_url =  $this->store->uploadImage($value->avatar_url, 'users');
        }
        $data = [
            'name' => $value->name,
            'email' => $value->email,
            'password' => Hash::make($value->password),
            'avatar_url' => $avatar_url ?? ''
        ];
        $user = $this->modal->create($data);
        $user->roles()->sync($value->roles);
        return $user;
    }
    function update($id, $value, $options = [])
    {
        $user = $this->modal->find($id);
        if (!empty($value->avatar_url)) {
            $this->store->deletePath($user->avatar_url);
            $avatar_url =   $this->store->uploadImage($value->avatar_url, 'users');
        }
        $user->update([
            'name' => $value->name ?? $user->name,
            'email' => $user->email,
            'avatar_url' => $avatar_url ?? $user->avatar_url
        ]);
        $user->roles()->sync($value->roles);
        return $user;
    }
    function delete($id, $options = [])
    {
    }
    function details($id, $option = null)
    {
        return $this->modal->find($id);
    }
    function all($options)
    {
        return $this->modal->search($options['search'] ?? null)->filters($options)->where('id', '!=', Auth::id())->paginate(25);
    }
    function updateStatus($id, $status)
    {
        $user = $this->modal->find($id);
        $user->update(['status' => $status]);
        return $user;
    }
}
