<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Repository\RepositoryMain\RolesRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    protected $modelPermissions;
    protected $rolesRepository;
    function __construct()
    {
        $this->modelPermissions = new Permissions();
        $this->rolesRepository = new RolesRepository();
    }
    function form($id = null)
    {
        return view('pages.setting.permissions');
    }
    function store(Request $req)
    {
        try {
            $this->rolesRepository->createPermissions($req->permission);
            return back()->with('message', ['content' => 'create permission success', 'type' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
            return back()->with('message', ['content' => 'create permission fail', 'type' => 'error']);
        }
    }
    function edit(Request $req, $id)
    {
    }
}
