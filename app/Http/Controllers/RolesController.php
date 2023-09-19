<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Roles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
    function showForm($id)
    {
        $roles = [];
        $form = [
            'action' => route('create-role'),
            'method' => 'POST',
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
    }
    function store(Request $req)
    {
        try {
            $roles =  $this->modelRoles->create([
                'name' => $req->name,
                'display_name' => $req->display,
                'description' => $req->description
            ]);
            $roles->permissions()->attach($req->permissions);

            return response()->json($roles);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    function edit(Request $req, $id)
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
}
