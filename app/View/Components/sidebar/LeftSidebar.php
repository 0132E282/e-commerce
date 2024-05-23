<?php

namespace App\View\Components\sidebar;

use App\Repository\RepositoryMain\BrandsRepository;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\ProductsValidationRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LeftSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    protected $categoryRepository;
    protected $brandsRepository;
    protected $productsVariants;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->productsVariants = new ProductsValidationRepository();
        $this->brandsRepository = new BrandsRepository();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categoryList =  $this->categoryRepository->all();
        $brands =  $this->brandsRepository->all([], function ($query) {
            $query->orderBy('total_views', "DESC")->limit(7);
        });
        $productVariants = $this->productsVariants->topProductByOrder();
        return view('components/sidebar/left-sidebar', ['categoryList' => $categoryList, 'brands' => $brands, 'productVariants' => $productVariants]);
    }
}
