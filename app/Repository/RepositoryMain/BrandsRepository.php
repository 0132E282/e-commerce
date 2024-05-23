<?php

namespace App\Repository\RepositoryMain;

use App\Models\Brands;
use App\Repository\RepositoryMain\BaseRepository;

class BrandsRepository extends BaseRepository
{
    protected $modal;
    function __construct()
    {
        $this->modal = new Brands();
    }
    function create($value, $options = [])
    {
        return $this->modal->create($value->input());
    }
    function update($id, $value, $options = [])
    {
        return $this->modal->findOrFail($id)->update($value->input());
    }
    function delete($id, $options = [])
    {
        return $this->modal->findOrFail($id)->delete();
    }
    function details($id, $option = null)
    {
        return $this->modal->findOrFail($id);
    }
    function all($options = null, $query = null)
    {
        return $this->modal->withSum('products as total_views', 'views_count')->when(!empty($query), function ($queryBuild) use ($query) {
            call_user_func($query, $queryBuild);
        })->get();
    }
    function paginate($paginate = 15, $options = null)
    {
        return $this->modal->when(isset($options['status']) && $options['status'] != null, function ($query) use ($options) {
            $query->where('status', $options['status']);
        })->paginate($paginate);
    }
    function updateStatus($id, $status = null, $options = null)
    {
        return $this->modal->findOrFail($id)->update(['status' => $status]);
    }
    function trash($paginate = 25)
    {
        return $this->modal->onlyTrashed()->paginate($paginate);
    }
    function destroy($id, $options = [])
    {
        $brand =  $this->modal->onlyTrashed()->find($id);
        return  $brand->forceDelete();
    }
    function restore($id, $options = [])
    {
        $brand = $this->modal->onlyTrashed()->find($id);
        return $brand->restore();
    }
}
