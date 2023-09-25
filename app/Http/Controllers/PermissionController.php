<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    protected $modelPermissions;
    function __construct()
    {
        $this->modelPermissions = new Permissions();
    }
    function form($id = null)
    {
        $form = [
            'action' => route('create-permissions'),
            'method' => 'POST',
            'data' => [],
        ];
        if ($id) {
            $permission = $this->modelPermissions->find($id);
            $form = [
                'action' => route('update-permissions', $id),
                'method' => 'PUT',
                'data' => $permission,
            ];
        }
        return view('pages/permissions/form', ['form' => $form, 'valueBread' => $id]);
    }
    function store(Request $req)
    {
        try {
            $permission = $this->modelPermissions->create([
                'name' => $req->module_parent,
                'display_name' => $req->display_name ?? $req->module_parent,
                'parent_id' => 0,
            ]);
            if ($permission) {
                foreach ($req->permissions as $value) {
                    $name = $value . ' ' . $permission->name;
                    $this->modelPermissions->create([
                        'name' => $name,
                        'display_name' => $req->display_name ?? $value,
                        'parent_id' => $permission->id,
                        'key_code' => Str::slug($name, '_')
                    ]);
                }
            }
            return back()->with('message', ['content' => 'create permission success', 'type' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
            return back()->with('message', ['content' => 'create permission fail', 'type' => 'error']);
        }
    }
    function edit(Request $req, $id)
    {
        try {
            $permission = $this->modelPermissions->find($id);
            if ($permission) {
                foreach ($req->permissions as $value) {
                    $name = $value . ' ' . $permission->name;
                    $permission->permissionsChildren()->firstOrCreate([
                        'name' => $name,
                        'display_name' => $req->display_name ?? $value,
                        'parent_id' => $permission->id,
                        'key_code' => Str::slug($name, '_')
                    ]);
                }
            }
            return back()->with('message', ['content' => 'update permission success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'update permission fail', 'type' => 'error']);
        }
    }
}
