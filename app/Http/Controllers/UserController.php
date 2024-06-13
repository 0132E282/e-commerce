<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUser;
use App\Models\User;
use App\Repository\RepositoryMain\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    protected $modelUser;
    protected $userRepository;
    function __construct()
    {
        $this->modelUser = new User();
        $this->userRepository = new UserRepository();
        Paginator::useBootstrapFive();
    }
    function index(Request $request, $status = null)
    {

        $users = $this->userRepository->all(['status' => $status, ...$request->input()]);
        return view('pages.user.manager-all', ['users' => $users]);
    }
    function form($id = null)
    {
        $user = $this->userRepository->details($id);
        return view('pages.user.form', ['user' => $user]);
    }
    function profile($id)
    {
        $user = $this->userRepository->details($id);
        return view('pages.user.profile', ['user' => $user]);
    }
    function store(ValidateUser $req)
    {
        try {
            $user =  $this->userRepository->create($req);
            return back()->with('message', ['content' => 'user created success with id :' .  $user->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'user created fail', 'type' => 'error']);
        }
    }
    function edit(ValidateUser $req, $id)
    {
        try {
            $user =  $this->userRepository->update($id, $req);
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
        return view('pages.user.index', ['users' => $users]);
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
    function updateStatus($id,  $status)
    {
        try {
            $user =  $this->userRepository->updateStatus($id, $status);
            return back()->with('message', ['content' => 'destroy user success with id :' .  $user->id, 'type' => 'success']);
        } catch (\Exception $e) {
        }
    }
}
