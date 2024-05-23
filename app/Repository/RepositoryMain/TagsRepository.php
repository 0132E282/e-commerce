<?php

namespace App\Repository\RepositoryMain;

use App\Models\Products;
use App\Models\Tags;
use App\Repository\RepositoriesInterface\TagsRepositoryInterface;
use App\Repository\RepositoryMain\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class TagsRepository extends BaseRepository implements TagsRepositoryInterface
{
    protected $modal;
    protected $productsModel;

    function __construct()
    {
        $this->modal = new Tags();
        $this->productsModel = new Products();
    }
    private function dataTransform($data)
    {
        return  collect($data)->transform(function ($tag) {
            return ['name' => $tag];
        });
    }

    private function firstOrCreateMany($data)
    {
        $tags = [];
        foreach ($data as $tag) {
            $tags[] =  $this->modal->firstOrCreate(['name' => $tag['name']], $tag);
        }
        return collect($tags);
    }

    function create_by_products($product, $value, $options = [])
    {

        $data = $this->dataTransform($value);
        $tags = $this->firstOrCreateMany($data);
        foreach ($tags as $tag) {
            if (!$product->tags->contains($tag->id)) {
                $product->tags()->attach($tag->id);
            }
        }
        return $tags;
    }
    function create($value, $options = [])
    {
    }
    function update($id, $value, $options = [])
    {
    }
    function update_by_products($product, $value, $options = [])
    {
        $data = $this->dataTransform($value);
        $tags = $this->firstOrCreateMany($data);
        return $product->tags()->sync($tags->pluck('id'));
    }
    function delete($id, $options = [])
    {
    }
    function all($options)
    {
    }
    function details($id, $option = null)
    {
    }
}
