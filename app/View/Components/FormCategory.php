<?php

namespace App\View\Components;

use App\Components\Recusive;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCategory extends Component
{
    public $recusive;
    public $detailCategory;
    protected $modelCategory;
    public function __construct($detailCategory)
    {
        $this->detailCategory =  $detailCategory ?? [];
        $this->modelCategory = new Category();
        $this->recusive = new Recusive($this->modelCategory->all());
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $dataCategory =  $this->recusive->filterCategory(optional($this->detailCategory)->parent_id);
        return view('components/form/form-category', ['dataCategory' => $dataCategory]);
    }
}
