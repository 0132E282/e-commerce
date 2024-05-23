<?php

namespace App\Repository\RepositoryMain;

use App\Repository\RepositoriesInterface\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $modal;
    function __construct($modal = [])
    {
        $this->modal = $modal;
    }
    abstract function all($options);
    abstract function create($value, $options = []);
    abstract function delete($id, $options = []);
    abstract function update($id, $value, $options = []);
    abstract function details($id, $option = null);
}
