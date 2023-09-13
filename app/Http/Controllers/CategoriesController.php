<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\CategoryValidation;
use App\Models\Category;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    protected $modelCategory;
    function __construct()
    {
        Paginator::useBootstrapFive();
        $this->modelCategory = new Category();
    }
    function index()
    {
        $categoryList = $this->modelCategory->latest()->paginate(25);
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
            $categoryList = $this->modelCategory->all();
            $recusive = new Recusive($categoryList);
            $htmlSelect = $recusive->filterCategory($detailCategory->parent_id ?? 0);
            return View('pages/category/category-form', ['viewOptionCategory' => $htmlSelect, 'detailCategory' => $detailCategory]);
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
            $category->forceDelete();
            $this->modelCategory->where('parent_id', $id)->update(['parent_id' => 0]);
            return back()->with('message', ['content' => 'delete category success id :' .  $category->id_category, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('error', 'delete category failed');
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
