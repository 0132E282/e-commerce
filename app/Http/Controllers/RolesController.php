<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRoles;
use App\Models\Permissions;
use App\Models\Roles;
use App\Repository\RepositoryMain\RolesRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use function Laravel\Prompts\alert;

class RolesController extends Controller
{
    protected $modelRoles;
    protected $rolesRepository;
    function __construct()
    {
        $this->modelRoles = new Roles();
        $this->rolesRepository = new RolesRepository();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $roles = $this->rolesRepository->all();
        return view('pages.roles.index', ['roles' => $roles]);
    }
    function showForm($id = null)
    {
        try {
            $role =  $this->rolesRepository->details($id);
            return view('pages/roles/form', ['role' => $role]);
        } catch (Exception $e) {
            alert(404);
        }
    }
    function store(Request $req)
    {
        try {
            $this->rolesRepository->create($req);
            return back()->with('message', ['content' => 'Tạo phân quyền thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'Tạo phân quyền thất bại', 'type' => 'error']);
        }
    }
    function edit(ValidateRoles $req, $id)
    {
        try {
            $this->rolesRepository->update($id, $req);
            return back()->with('message', ['content' => 'update roles success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'update roles fail', 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $this->rolesRepository->delete($id);
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
            $this->rolesRepository->restore($id);
            return back()->with('message', ['content' => 'restore roles success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'restore roles fail', 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $this->rolesRepository->destroy($id);
            return back()->with('message', ['content' => 'delete roles success ', 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => 'delete roles fail', 'type' => 'error']);
        }
    }
}
