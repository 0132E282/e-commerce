<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\MenusValidation;
use App\Repository\RepositoryMain\MenusRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{
    protected $menusRepository;
    function __construct()
    {
        $this->menusRepository = new MenusRepository();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $menus =  $this->menusRepository->all();
        return view('pages.menus.manager-all', ['menus' =>  $menus]);
    }
    function showTrash()
    {
        $menus = $this->menusRepository->trash();
        return view('pages.menus.manager-trash', ['menus' =>  $menus, 'viewOptionMenus' => '']);
    }
    function showForm($id = null)
    {
        try {
            $menu = $this->menusRepository->details($id);
            return view('pages.menus.menus-forms', ['menu' => $menu]);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }

    function store(MenusValidation $req)
    {
        try {
            $menu =  $this->menusRepository->create([
                'name' => $req->name,
                'description' => $req->description,
                'location' => $req->location,
                'user_id' => Auth::id(),
            ]);
            return back()->with('message', ['content' => 'Tạo menu thành công :' .  $menu->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        };
    }
    function edit(MenusValidation $req, $id)
    {
        try {
            $menu = $this->menusRepository->update($id, [
                'name' => $req->name,
                'description' => $req->description,
                'location' => $req->location,
            ]);
            return back()->with('message', ['content' => 'cập nhập menu thành công :' .    $menu->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'cập nhập menu thất bại', 'type' => 'error']);
        };
    }
    function delete($id)
    {
        try {
            $menu = $this->menusRepository->delete($id);
            return back()->with('message', ['content' => 'xóa menu thanh công :' .  $menu->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $menu = $this->menusRepository->destroy($id);
            return back()->with('message', ['content' => 'delete menus tag success id :' .   $menu->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('error', 'delete menus tag failed');
        }
    }
    function restore($id)
    {
        try {
            $menus = $this->menusRepository->restore($id);
            return back()->with('message', ['content' => 'restore menus tag success :' .   $menus->id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage() . ' ' .   $menus->id, 'type' => 'error']);
        }
    }
}
