<?php

namespace App\View\Components\Form;

use App\Repository\RepositoryMain\CategoryRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCategory extends Component
{
    public $recusive;
    public $detailCategory;
    protected $CategoryRepository;

    public function __construct($detailCategory)
    {
        $this->detailCategory =  $detailCategory ?? [];
        $this->CategoryRepository = new CategoryRepository();
    }
    /**
     * Get the view / contents that represent the component.
     */



    public function render(): View|Closure|string
    {
        $categoryList = $this->CategoryRepository->all([], function ($query) {
            $query->when(!empty($this->detailCategory), function ($query) {
                $query->where('id', '!=', optional($this->detailCategory)->id);
                $query->orWhereDoesntHave('children', function ($query) {
                    return $query->where('id', '!=', $this->detailCategory->id);
                });
            });
        });
        return view('components.form.form-category', ['categoryList' => $categoryList]);
    }
}
