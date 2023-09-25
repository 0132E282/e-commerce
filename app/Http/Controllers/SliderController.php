<?php

namespace App\Http\Controllers;

use App\Components\StorageImage;
use App\Http\Requests\ValidateSlider;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SliderController extends Controller
{
    protected $modelSlider;
    function __construct()
    {
        $this->modelSlider = new Sliders();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $slider = $this->modelSlider->paginate(25);
        return view('/pages/slider/index', ['slider' => $slider]);
    }
    function demo()
    {
        return view('pages.slider.demo');
    }
    function trash()
    {
        $slider = $this->modelSlider->onlyTrashed()->paginate(25);
        return view('/pages/slider/index', ['slider' => $slider]);
    }
    function showForm($id = null)
    {
        $sliderDetails = [];
        if ($id) {
            $sliderDetails = $this->modelSlider->find($id);
        }
        return view('pages/slider/form', ['sliderDetails' => $sliderDetails]);
    }
    function create(ValidateSlider $req)
    {
        try {
            if ($req->hasFile('image_url')) {
                $imageUrl = StorageImage::uploadImage($req->image_url, 'slider', 390, 356);
            }
            $slider = $this->modelSlider->create([
                'image_url' => $imageUrl,
                'name_slider' => $req->name_slider,
                'description_slider' => $req->description_slider
            ]);
            return back()->with('message', ['content' => 'create slider success id:' . $slider->id_slider, 'type' => 'success']);
        } catch (\Exception $e) {
            return $e->getMessage();
            return back()->with('message', ['content' => 'create slider fail', 'type' => 'error']);
        }
    }
    function update(ValidateSlider $req, $id)
    {
        try {
            $sliderDetails = $this->modelSlider->find($id);
            if ($req->hasFile('image_url')) {
                StorageImage::deleteImagePath($sliderDetails, 'image_url');
                $imageUrl = StorageImage::uploadImage($req->image_url, 'slider', 390, 356);
            }
            $sliderDetails->update([
                'image_url' => $imageUrl ?? $sliderDetails->image_url,
                'name_slider' => $req->name_slider,
                'description_slider' => $req->description_slider
            ]);
            return back()->with('message', ['content' => 'update slider success id :' . $sliderDetails->id_slider, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['update slider fail', 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $sliderDetails = $this->modelSlider->find($id);
            $sliderDetails->delete();
            return back()->with('message', ['content' => 'delete slider success id :' . $sliderDetails->id_slider, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['update slider fail', 'type' => 'error']);
        }
    }
    function restore($id)
    {
        try {
            $sliderDetails = $this->modelSlider->onlyTrashed()->find($id);
            $sliderDetails->restore();
            return back()->with('message', ['content' => 'restore slider success id :' . $sliderDetails->id_slider, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['update slider fail', 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $sliderDetails = $this->modelSlider->onlyTrashed()->find($id);
            if ($sliderDetails->image_url) {
                StorageImage::deleteImagePath($sliderDetails, 'image_url');
            }
            $sliderDetails->forceDelete();
            return back()->with('message', ['content' => 'destroy slider success id :' . $sliderDetails->id_slider, 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => 'destroy slider fail', 'type' => 'error']);
        }
    }
}
