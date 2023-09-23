<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Exception;
use App\Http\Requests\MenusValidation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class MenusController extends Controller
{
    private $modelMenus;
    function __construct()
    {
        $this->modelMenus = new Menus();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $menusList = $this->modelMenus->latest()->paginate(25);

        return View('pages/menus/index', ['menusList' =>  $menusList, 'viewOptionMenus' => '']);
    }
    function showTrash()
    {
        $menusList = $this->modelMenus->onlyTrashed()->paginate(25);
        return View('pages/menus/index', ['menusList' =>  $menusList, 'viewOptionMenus' => '']);
    }
    function showForm($id = '')
    {
        try {
            $form = [
                'route' => route('create-menus'),
                'method' => 'post',
                'data' => [],
            ];
            if ($id) {
                $detailMenus = $this->modelMenus->find($id);
                $form = [
                    'route' => route('update-menus', $id),
                    'method' => 'put',
                    'data' => $detailMenus,
                ];
            }
            return View('pages/menus/menus-forms', ['form' => $form, 'valueBread' => $form['data']]);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $menus =  $this->modelMenus->find($id);
            $menus->delete();
            $this->modelMenus->where('parent_id', $id)->delete();

            return back()->with('message', ['content' => 'delete menus success :' .  $menus->id_menus, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function store(MenusValidation $req)
    {
        try {
            $menus = $this->modelMenus->create(
                [
                    'name_menus' => $req->name_menus,
                    'route' => $req->route_menus,
                    'parent_id' => $req->parent_id ?? 0,
                    'slug' => Str::slug($req->name_menus)
                ]
            );
            return back()->with('message', ['content' => 'create menus success :' .  $menus->id_menus, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        };
    }
    function edit(MenusValidation $req, $id)
    {
        try {
            $menus = $this->modelMenus->find($id);
            $menus->update(
                [
                    'name_menus' => $req->name_menus,
                    'route' => $req->route_menus,
                    'parent_id' => $req->parent_id ?? 0,
                    'slug' => Str::slug($req->name_menus)
                ]
            );
            return back()->with('message', ['content' => 'update menus success :' .  $menus->id_menus, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        };
    }
    function destroy($id)
    {
        try {
            $menus =  $this->modelMenus->onlyTrashed()->find($id);
            $menus->forceDelete();
            $this->modelMenus->where('parent_id', $id)->update(['parent_id' => 0]);
            return back()->with('message', ['content' => 'delete menus tag success id :' .   $menus->id_menus, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('error', 'delete menus tag failed');
        }
    }
    function restore($id)
    {
        try {
            $menus = $this->modelMenus->onlyTrashed()->find($id);
            $parentCategory = $this->modelMenus->where('parent_id', $id);
            if ($menus->parent_id > 0) {
                $menus->update(['parent_id' => 0]);
            }
            $menus->restore();
            $parentCategory->restore();
            return back()->with('message', ['content' => 'restore menus tag success :' .   $menus->id_menus, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage() . ' ' .   $menus->id_menus, 'type' => 'success']);
        }
    }
}
