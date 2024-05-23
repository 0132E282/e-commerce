<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandsRequests;
use App\Repository\RepositoryMain\BrandsRepository;
use Exception;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS;

class brandsController extends Controller
{
    protected $brandsRepository;
    function __construct()
    {
        $this->brandsRepository = new BrandsRepository();
    }
    function index()
    {
        try {
            $brands =  $this->brandsRepository->paginate(25);
            return view('pages.brands.manager-all', ['brands' => $brands]);
        } catch (Exception $e) {
        }
    }
    function status($status)
    {
        try {
            $brands =  $this->brandsRepository->paginate(25, ['status' => $status]);
            return view('pages.brands.manager-all', ['brands' => $brands]);
        } catch (Exception $e) {
        }
    }
    function trash()
    {
        try {
            $brands =  $this->brandsRepository->trash(25);
            return view('pages.brands.manager-all', ['brands' => $brands]);
        } catch (Exception $e) {
        }
    }
    function form($id = null)
    {
        if (!empty($id)) {
            $brand = $this->brandsRepository->details($id);
        }
        return view('pages.brands.form', ['brand' => $brand ?? []]);
    }
    function store(BrandsRequests $req)
    {
        try {
            $this->brandsRepository->create($req);
            return back()->with('message', ['content' => 'tạo thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'Tạo thất bại :' . $e->getMessage(), 'type' => 'error']);
        }
    }
    function edit(BrandsRequests $req, $id)
    {
        try {
            $this->brandsRepository->update($id, $req);
            return back()->with('message', ['content' => 'cập nhập nhản hiệu thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'cập nhập nhản hiệu thất bại :' . $e->getMessage(), 'type' => 'error']);
        }
    }
    function restore($id = null)
    {
        try {
            $this->brandsRepository->restore($id);
            return back()->with('message', ['content' => 'khôi phục nhản hiệu thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'khôi phục nhản hiệu thất bại :' . $e->getMessage(), 'type' => 'error']);
        }
    }
    function destroy($id = null)
    {
        try {
            $this->brandsRepository->destroy($id);
            return back()->with('message', ['content' => 'đã xóa nhản hiệu thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'đã xóa nhản hiệu thất bại :' . $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $this->brandsRepository->delete($id);
            return back()->with('message', ['content' => 'xóa thương hiệu thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'xóa thương hiệu thất bại :' . $e->getMessage(), 'type' => 'error']);
        }
    }
    function updateStatus($id, $status)
    {
        try {
            $this->brandsRepository->updateStatus($id, $status);
            return back()->with('message', ['content' => 'cập nhập trạng  thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'cập nhập trạng   thất bại :' . $e->getMessage(), 'type' => 'error']);
        }
    }
}
