<?php

namespace App\Imports;

use App\Repository\RepositoryMain\CategoryRepository;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel,  WithCustomValueBinder, WithHeadingRow
{
    public $categoryRepository;
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function bindValue($cell, $value)
    {
        return 'form-category';
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $parent_id = !empty($row['parent'])  ?  explode('-', $row['parent'])['1'] : null;
        if ($row['name'] != '') {
            return $this->categoryRepository->create([
                'name' =>  trim($row['name']),
                'description' => trim($row['description']),
                'parent_id' => $parent_id,
                'slug' => Str::slug($row['name'])
            ]);
        }
    }
}
