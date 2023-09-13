<?php

namespace App\View\Components;

use App\Components\Recusive;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormProducts extends Component
{
    public $recusive;
    public $dataForm;
    protected $modelCategory;
    public function __construct($dataForm = [])
    {
        $this->dataForm = $dataForm;
        $this->modelCategory = new Category();
        $this->recusive = new Recusive($this->modelCategory->all());
    }


    public function render(): View|Closure|string
    {
        $id = optional($this->dataForm)->id_category;
        $dataCategory =  $this->recusive->filterCategory($id);

        return view('components/form/form-products', ['dataCategory' => $dataCategory]);
    }
}
