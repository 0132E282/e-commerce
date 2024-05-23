<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menus;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\MenusRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuItemController extends Controller
{
    protected $categoryRepository;
    protected $menusRepository;
    function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->menusRepository = new MenusRepository();
    }
    function index($id)
    {
        $menuItems = $this->menusRepository->details($id)->menu_items()->orderBy('location', 'ASC')->whereNull('parent_id')->get();
        $categoryList = $this->categoryRepository->all([], function ($query) {
            $query->where('status', 1);
        });
        $routes = Route::getRoutes()->getRoutesByName();
        $routes = collect($routes)->filter(function ($route) {
            return strpos($route->getName(), 'client') !== false && in_array('GET', $route->methods());
        });
        return view('pages.menus.manager-menu-item', ['menuItems' => $menuItems, 'categoryList' => $categoryList, 'routes' =>  $routes]);
    }
    function create($id, $type, Request $req)
    {
        $data = [];
        switch ($type) {
            case '1':
                $category = Category::all()->whereIn('id', $req->category)->all();
                $data = collect($category)->map(function ($category) {
                    return [
                        'title' => $category->name,
                        'link' => route('client.shop.category', ['slug' => $category->slug]),
                        'type' => 1,
                    ];
                });
                break;
            case '2':
                $data = collect($req->routeName)->map(function ($route) {
                    return [
                        'title' =>  str_replace('-', ' ', str_replace('client.', '', $route)),
                        'link' => route($route),
                        'type' => 2
                    ];
                });
                break;
            case '3':
                $data = [[
                    'title' => $req->title,
                    'link' => $req->links,
                    'type' => 3
                ]];
        }
        $this->menusRepository->createMenuItems($id, $data);
        return back();
    }
    function updateParent($id, $id_parent, Request $req)
    {
        try {
            $this->menusRepository->updateMenuItemsParent($id, $req->menu_id, $id_parent);
            return back()->with('message', ['content' => 'cập nhập thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id_menu, $id_menu_item)
    {
        try {
            $this->menusRepository->deleteMenuItem($id_menu, $id_menu_item);
            return back()->with('message', ['content' => 'xóa thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'xóa thât bại', 'type' => 'error']);
        }
    }
    function update($id_menu, $id_menu_item, Request $req)
    {
        try {
            $data = [
                'link' =>  $req->link,
                'title' =>  $req->title,
                'location' => $req->locaion,
            ];
            $this->menusRepository->updateMenuItem($id_menu, $id_menu_item, $data);
            return back()->with('message', ['content' => 'Cập nhập thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'Cập nhập thất bại', 'type' => 'error']);
        }
    }
}
