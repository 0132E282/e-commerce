<?php

namespace App\Http\Controllers;

use App\Components\StorageImage;
use App\Http\Requests\SliderRequest;
use App\Models\Sliders;
use App\Repository\RepositoryMain\SliderRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    protected $modelSlider;
    protected $sliderRepository;
    function __construct()
    {
        $this->modelSlider = new Sliders();
        $this->sliderRepository = new SliderRepository();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $slider = $this->sliderRepository->all();
        return view('pages.slider.manager-all', ['slider' => $slider]);
    }
    function trash()
    {
        $slider = $this->modelSlider->onlyTrashed()->paginate(25);
        return view('pages.slider.manager-all', ['slider' => $slider]);
    }
    function showForm($id = null)
    {
        $sliderDetails = [];
        if ($id) {
            $sliderDetails = $this->modelSlider->find($id);
        }
        return view('pages.slider.form', ['sliderDetails' => $sliderDetails]);
    }
    function create(SliderRequest $req)
    {
        try {
            $data = [
                'title' => $req->title,
                'content' => $req->content,
                'image_url' => $req->image_url,
                'links' => $req->links,
                'location' => $req->location,
                'user_id' => Auth::id(),
            ];
            $slider = $this->sliderRepository->create($data);
            return back()->with('message', ['content' => 'tạo thành công id:' . $slider->id, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function update($id, SliderRequest $req)
    {
        try {
            $sliderDetails = $this->sliderRepository->update($id, $req);
            return back()->with('message', ['content' => 'cập nhập thành công id :' . $sliderDetails->id, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' =>  $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $sliderDetails = $this->sliderRepository->delete($id);
            return back()->with('message', ['content' => 'delete slider success id :' . $sliderDetails->id, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['update slider fail', 'type' => 'error']);
        }
    }
    function restore($id)
    {
        try {
            $sliderDetails = $this->sliderRepository->restore($id);
            return back()->with('message', ['content' => 'restore slider success id :' . $sliderDetails->id_slider, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['update slider fail', 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $sliderDetails = $this->sliderRepository->destroy($id);
            return back()->with('message', ['content' => 'destroy slider success id :' . $sliderDetails->id, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => 'destroy slider fail', 'type' => 'error']);
        }
    }
}
