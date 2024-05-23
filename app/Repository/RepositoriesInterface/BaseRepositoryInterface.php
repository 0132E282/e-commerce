<?php

namespace App\Repository\RepositoriesInterface;


interface BaseRepositoryInterface
{
    function all($options);
    function create($value, $options = []);
    function update($id, $value, $options = []);
    function delete($id, $options = []);
    function details($id, $option = null);
}
