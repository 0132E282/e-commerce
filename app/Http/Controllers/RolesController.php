<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRoles;
use App\Models\Permissions;
use App\Models\Roles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use function Laravel\Prompts\alert;

class RolesController extends Controller
{
    protected $modelRoles;
    function __construct()
    {
        $this->modelRoles = new Roles();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $roles = $this->modelRoles->latest()->paginate(25);;
        return view('pages/roles/index', ['roles' => $roles]);
    }
    function showForm($id = null)
    {
        try {
            $roles = [];
            $form = [
                'action' => route('create-role'),
                'method' => 'POST',
                'data' => []
            ];
            if ($id) {
                $roles = $this->modelRoles->find($id);
                $roles->permissions = $roles->permissions()->get();
                $form = [
                    'action' => route('update-role', $id),
                    'method' => 'PUT',
                    'data' =>  $roles
                ];
            }
            return view('pages/roles/form', ['form' =>  $form, 'dataForm' => $roles, 'valueBread' => $roles]);
        } catch (Exception $e) {
            alert(404);
        }
    }
    function store(ValidateRoles $req)
    {
        try {
            $roles =  $this->modelRoles->create([
                'name' => $req->name,
                'display_name' => $req->display,
                'description' => $req->description
            ]);
            $roles->permissions()->attach($req->permissions);

            return back()->with('message', ['content' => 'create roles success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'create roles fail', 'type' => 'error']);
        }
    }
    function edit(ValidateRoles $req, $id)
    {
        try {
            $roles =  $this->modelRoles->find($id);
            $roles->update([
                'name' => $req->name,
                'display_name' => $req->display,
                'description' => $req->description
            ]);
            $roles->permissions()->sync($req->permissions);
            return back()->with('message', ['content' => 'update roles success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'update roles fail', 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $roles =  $this->modelRoles->find($id);
            $roles->delete();
            return back()->with('message', ['content' => 'delete roles success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'delete roles fail', 'type' => 'error']);
        }
    }
    function trash()
    {
        try {
            $roles = $this->modelRoles->onlyTrashed()->paginate(25);
            return view('pages/roles/index', ['roles' => $roles]);
        } catch (Exception $e) {
        }
    }
    function restore($id)
    {
        try {
            $roles =  $this->modelRoles->onlyTrashed()->find($id);
            $roles->restore();
            return back()->with('message', ['content' => 'restore roles success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'restore roles fail', 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $roles = $this->modelRoles->onlyTrashed()->find($id);
            $roles->permissions()->sync([]);
            $roles->forceDelete();
            return back()->with('message', ['content' => 'delete roles success ', 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => 'delete roles fail', 'type' => 'error']);
        }
    }
}
