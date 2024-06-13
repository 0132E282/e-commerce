<?php

namespace App\Repository\RepositoryMain;

use App\Models\Sliders;
use App\Repository\RepositoryMain\BaseRepository;
use App\storage\StoreFactory;
use Illuminate\Support\Facades\Auth;

class SliderRepository extends BaseRepository
{
    protected $modal;
    protected $store;
    function __construct()
    {
        $this->store = StoreFactory::initialize();
        $this->modal = new Sliders();
    }
    function all($options = null)
    {
        return $this->modal->paginate();
    }
    function create($value, $options = [])
    {
        if (!empty($value['location'])) {
            $sliderHasLocation = $this->modal->where('location', '=', $value['location'])->get();
            if ($sliderHasLocation->count() > 0) {
                $sliderHasLocation->update(['location' => null]);
            }
        }
        if (!empty($value['image_url']) && file_exists($value['image_url'])) {
            $value['image_url'] = $this->store->uploadImage($value['image_url'], 'sliders');
        }
        return $this->modal->create($value);
    }
    function update($id, $value, $options = [])
    {
        $slider = $this->modal->find($id);
        $data = [
            'title' => $value->title ?? $slider->title,
            'content' => $value->content ?? $slider->content,
            'image_url' => $value->image_url ?? $slider->image_url,
            'links' => $value->links,
            'location' => $value->location  ?? $slider->location,
        ];
        if (!empty($value['location'])) {
            $this->modal->where('location', '=', $value['location'])->update(['location' => null]);
        }
        if (!empty($value['image_url']) && file_exists($value['image_url'])) {
            $isDeleteImage =  $this->store->deletePath($slider->image_url);
            if ($isDeleteImage == true) $value['image_url'] = $this->store->uploadImage($value['image_url'], 'sliders');
        }
        $slider->update($data);
        return $slider;
    }
    function delete($id, $options = [])
    {
        return $this->modal->find($id)->delete();
    }
    function restore($id, $options = [])
    {
        $sliderDetails = $this->modal->onlyTrashed()->find($id);
        return $sliderDetails->restore();
    }
    function details($id, $option = null)
    {
    }
    function destroy($id, $options = [])
    {
        $sliderDetails = $this->modal->onlyTrashed()->find($id);
        $this->store->deletePath($sliderDetails['image_url']);
        $sliderDetails->forceDelete();
        return $sliderDetails;
    }
}
