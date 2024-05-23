<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\View\Components\Category\Details;

use App\Http\Requests\CategoryValidation;
use App\Imports\CategoryImport;
use App\Models\Category;
use App\Models\Products;
use App\Repository\RepositoryMain\CategoryRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class CategoriesController extends Controller
{
    protected $modelCategory;
    protected $modelProduct;
    protected $CategoryRepository;
    function __construct()
    {
        Paginator::useBootstrapFive();
        $this->modelCategory = new Category();
        $this->modelProduct = new Products();
        $this->CategoryRepository = new CategoryRepository();
    }
    function all_api()
    {
        $categoryList = $this->modelCategory->get();
        $categoryList->transform(function ($category) {
            return [
                'id' =>  $category->id,
                'name' => $category->name . '-' .  $category->id,
                'created_at' => $category->created_at,
                'updated_at' => $category->updated_at,
                'parent_id' =>  $category->parent_id,
                'description' =>  $category->description,
                'status' =>  $category->status,
            ];
        });
        return response()->json($categoryList);
    }
    function index(Request $request, $status = null)
    {
        $option = [
            'order' => $request->order,
            'by' => $request->by,
            'views' => $request->views,
            'search' => $request->search,
            'created' => $request->created,
            'products' => $request->products
        ];
        switch ($status) {
            case "stop-working":
                $option['status'] = 0;
                $categoryList =  $this->CategoryRepository->all($option);
                return view('pages.category.category-all', ['categoryList' => $categoryList]);
            case "is-active":
                $option['status'] = 1;
                $categoryList =  $this->CategoryRepository->all($option);
                return view('pages.category.category-all', ['categoryList' => $categoryList]);
            default:
                $categoryList = $this->CategoryRepository->all($option);
                return view('pages.category.category-all', ['categoryList' => $categoryList]);
        }
    }

    function showTrash(Request $request)
    {
        $option = [
            'order' => $request->order,
            'by' => $request->by,
            'views' => $request->views,
            'search' => $request->search,
            'created' => $request->created,
            'products' => $request->products
        ];
        $categoryList =  $this->CategoryRepository->trash($option);
        return view('pages.category.category-all', ['categoryList' => $categoryList]);
    }
    function showForm($id = null)
    {
        try {
            $detailCategory = $this->CategoryRepository->details($id);
            return view('pages.category.category-form', ['detailCategory' => $detailCategory, 'detailProduct' => $detailCategory]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    function store(CategoryValidation $req)
    {
        try {
            $valueCategory = [
                'name' => $req->name_category,
                'parent_id' => $req->parent,
                'slug' => Str::slug($req->name_category),
                'description' => $req->description
            ];
            $this->CategoryRepository->create($valueCategory);
            return back()->with('message', ['content' => 'create category successfully', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function edit(CategoryValidation $req, $id)
    {
        try {
            $ValueCategoryUpdate = [
                'name' => $req->name_category,
                'parent_id' => $req->parent ?? NULL,
                'slug' => Str::slug($req->name_category),
                'description' => $req->description
            ];
            $this->CategoryRepository->update($id, $ValueCategoryUpdate);
            return back()->with('message', ['content' => 'update danh mục thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $this->CategoryRepository->delete($id);
            return back()->with('message', ['content' => 'delete category success id :' .  $id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('error', 'delete category failed');
        }
    }

    function destroy($id)
    {
        try {
            $this->CategoryRepository->destroy($id);
            return back()->with('message', ['content' => 'delete category success id :' . $id, 'type' => 'success']);
        } catch (Exception $e) {
            return $e->getMessage();
            return back()->with('message', ['content' => 'delete category fail ', 'type' => 'error']);
        }
    }
    function restore($id)
    {
        try {
            $this->CategoryRepository->restore($id);
            return back()->with('message', ['content' => 'restore category success :' . $id, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage() . ' ' . $id, 'type' => 'success']);
        }
    }
    function details($id = null)
    {
        $category = $this->CategoryRepository->details($id);
        $htmlDetail = (new Details($category))->render();
        return $htmlDetail;
    }
    function export(Request $request)
    {
        $typeFile = explode('-', $request->type_file);
        $nameFile = $request->name_file . '.' . $typeFile[0];
        return Excel::download(new CategoryExport, $nameFile, constant('Maatwebsite\Excel\Excel::' . $typeFile[1]));
    }
    function updateStatus(Request $req, $id)
    {
        try {
            $this->CategoryRepository->updateStatus($id);
            return back()->with('message', ['content' => 'Cập nhập trang thái thành công ', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'Cập nhập trang thái thất bại ', 'type' => 'error']);
        }
    }
    function import_file(Request $req)
    {
        try {
            $path = $req->file('file_import');
            Excel::import(new CategoryImport, $path);
            return back()->with('message', ['content' => 'Tải dữ liệu thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'Tải dữ liệu  thái thất bại ', 'type' => 'error']);
        }
    }
}
