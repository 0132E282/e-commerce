<?php

namespace App\View\Components\Form;

use App\Components\Recusive;
use App\Models\Category;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\BrandsRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormProducts extends Component
{
    protected $categoryRepository;
    protected $detailProduct;
    protected $brandsRepository;
    public function __construct($detailProduct = [])
    {
        $this->detailProduct = $detailProduct;
        $this->categoryRepository = new CategoryRepository();
        $this->brandsRepository = new BrandsRepository();
    }


    public function render(): View|Closure|string
    {
        $categoryList = $this->categoryRepository->all();
        $brands = $this->brandsRepository->all();
        return view('components/form/form-products', ['categoryList' => $categoryList, 'detailProduct' => $this->detailProduct, 'brands' => $brands]);
    }
}
