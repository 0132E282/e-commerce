<?php

namespace App\Http\Controllers;

use App\Components\StorageImage;
use App\Http\Requests\ValidateUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    protected $modelUser;
    function __construct()
    {
        $this->modelUser = new User();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $user = Auth::id();
        $users = $this->modelUser->latest()->where('id', '!=', $user)->paginate(25);
        return view('pages/user/index', ['users' => $users]);
    }
    function form($id = null)
    {
        $form = [
            'route' => route('create-user'),
            'method' => 'POST',
            'data' => [],
        ];
        if ($id) {
            $user = $this->modelUser->find($id);
            $user->roles = $user->roles()->get();
            $form = [
                'route' => route('update-user', $id),
                'method' => 'put',
                'data' => $user,
            ];
        }
        return view('pages/user/form', ['form' => $form]);
    }
    function store(ValidateUser $req)
    {
        try {
            $user =  $this->modelUser->create([

                'name' => $req->name,
                'email' => $req->email,
                'password' => $req->password,
            ]);
            $user->roles()->attach($req->roles);
            return back()->with('message', ['content' => 'user created success with id :' .  $user->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'user created fail', 'type' => 'error']);
        }
    }
    function edit(ValidateUser $req, $id)
    {
        try {
            $user = $this->modelUser->find($id);
            $password = bcrypt($user->password);
            $user->update([
                'name' => $req->name ?? $user->name,
                'email' => $user->email,
                'password' => $req->password ?? $user->password
            ]);
            $user->roles()->sync($req->roles);
            return back()->with('message', ['content' => ' update user success with id :' .  $user->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => ' update user fail', 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $user = $this->modelUser->find($id);
            $user->delete();
            return back()->with('message', ['content' => ' delete user success with id :' .  $user->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => ' delete user fail', 'type' => 'error']);
        }
    }
    function trash()
    {
        $users = $this->modelUser->latest()->onlyTrashed()->paginate(25);
        return view('pages/user/index', ['users' => $users]);
    }
    function restore($id)
    {
        try {
            $user =  $this->modelUser->onlyTrashed()->find($id);
            $user->withTrashed()->restore();
            return back()->with('message', ['content' => 'restore user success with id :' .  $user->id, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => 'restore user fail with id :' .  $user->id, 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $user =  $this->modelUser->onlyTrashed()->find($id);
            $user->roles()->sync([]);
            $user->forceDelete();
            return back()->with('message', ['content' => 'destroy user success with id :' .  $user->id, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => 'destroy user fail ', 'type' => 'error']);
        }
    }
}
