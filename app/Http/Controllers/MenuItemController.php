<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Menus;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\MenusRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
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
        $brands = Brands::all();
        $routes = Route::getRoutes()->getRoutesByName();
        $routes = collect($routes)->filter(function ($route) {
            return strpos($route->getName(), 'client') !== false && in_array('GET', $route->methods());
        });
        return view('pages.menus.manager-menu-item', ['menuItems' => $menuItems, 'categoryList' => $categoryList, 'routes' =>  $routes, 'brands' => $brands]);
    }
    function create($id, $type, Request $req)
    {
        try {
            $data = [];
            switch ($type) {
                case '1':
                    $validator = Validator::make($req->all(), [
                        'category' => 'required',
                    ]);
                    throw_if($validator->fails(), 'chưa chọn danh mục sản phẩm');

                    $category = Category::all()->whereIn('id', $req->category)->all();
                    $data = collect($category)->map(function ($category) {
                        return [
                            'title' => $category->name,
                            'link' => route('client.shop.category', $category),
                            'type' => 1,
                        ];
                    });
                    break;
                case '2':
                    $validator = Validator::make($req->all(), [
                        'routeName' => 'required',
                    ]);
                    throw_if($validator->fails(), 'chưa chọn đường dẫn liên kết');
                    $data = collect($req->routeName)->map(function ($route) {
                        return [
                            'title' =>  str_replace('-', ' ', str_replace('client.', '', $route)),
                            'link' => route($route),
                            'type' => 2
                        ];
                    });
                    break;
                case '3':
                    $validator = Validator::make($req->all(), [
                        'title' => 'required',
                        'links' => 'required',
                    ]);
                    throw_if($validator->fails(), 'bạn chưa nhập tiêu đề hoạt đường dẫn links');
                    $data = [
                        [
                            'title' => $req->title,
                            'link' => $req->links,
                            'type' => 3
                        ]
                    ];
                    break;
                case '4':
                    $validator = Validator::make($req->all(), [
                        'brands' => 'required',
                    ]);
                    throw_if($validator->fails(), 'bạn chưa chọn nhản hiệu cần liên kết dẫn links');
                    $brands = Brands::all()->whereIn('id', $req->brands)->all();
                    $data = collect($brands)->map(function ($brand) {
                        return [
                            'title' =>  str_replace('-', ' ', str_replace('client.', '', $brand->name)),
                            'link' => route('client.shop.brand', $brand),
                            'type' => 4
                        ];
                    });
                    break;
            }
            $this->menusRepository->createMenuItems($id, $data);
            return back()->with('message', ['content' => 'đã thêm thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
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
