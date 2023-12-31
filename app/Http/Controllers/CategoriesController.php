<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\CategoryValidation;
use App\Models\Category;
use App\Models\Products;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    protected $modelCategory;
    protected $modelProduct;
    function __construct()
    {
        Paginator::useBootstrapFive();
        $this->modelCategory = new Category();
        $this->modelProduct = new Products();
    }
    function index()
    {
        $categoryList = $this->modelCategory->latest()->paginate(25, ['id_category', 'name_category', 'slug_category', 'created_at']);
        return View('pages/category/index', ['categoryList' => $categoryList]);
    }
    function showTrash()
    {
        $categoryList = $this->modelCategory->onlyTrashed()->paginate(25);
        return View('pages/category/index', ['categoryList' => $categoryList]);
    }
    function showForm($id = 0)
    {
        try {
            $detailCategory = [];
            if ($id > 0) {
                $detailCategory = $this->modelCategory->find($id);
            }
            return View('pages/category/category-form', ['detailCategory' => $detailCategory, 'detailProduct' => $detailCategory]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    function store(CategoryValidation $req)
    {
        try {
            Category::create([
                'name_category' => $req->name_category,
                'parent_id' => $req->parent_id ?? 0,
                'slug_category' => Str::slug($req->name_category),
            ]);
            return back()->with('message', ['content' => 'create category successfully', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function edit(CategoryValidation $req, $id)
    {
        $detailCategory = $this->modelCategory->find($id);
        try {
            $detailCategory->update([
                'name_category' => $req->name_category ??   $detailCategory->name_category,
                'parent_id' => $req->parent_id ?? 0,
                'slug_category' => Str::slug($req->name_category),
            ]);
            return back()->with('message', ['content' => 'update category success id :' . $detailCategory->id_category, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $category =  $this->modelCategory->find($id);

            $category->delete();

            $this->modelCategory->where('parent_id', $id)->delete();
            return back()->with('message', ['content' => 'delete category success id :' .  $category->id_category, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('error', 'delete category failed');
        }
    }

    function destroy($id)
    {
        try {

            $category =  $this->modelCategory->onlyTrashed()->find($id);
            if (empty($category->product)) {
                $category->product->update(['parent_id' => null]);
            }
            $category->forceDelete();
            return back()->with('message', ['content' => 'delete category success id :' .  $category->id_category, 'type' => 'success']);
        } catch (Exception $e) {
            return $e->getMessage();
            return back()->with('message', ['content' => 'delete category fail ', 'type' => 'error']);
        }
    }
    function restore($id)
    {
        try {
            $category = $this->modelCategory->onlyTrashed()->find($id);
            $parentCategory = $this->modelCategory->where('parent_id', $id);
            if ($category->parent_id > 0) {
                $category->update(['parent_id' => 0]);
            }
            $category->restore();
            $parentCategory->restore();
            return back()->with('message', ['content' => 'restore category success :' .  $category->id_category, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage() . ' ' .  $category->id_category, 'type' => 'success']);
        }
    }
}
