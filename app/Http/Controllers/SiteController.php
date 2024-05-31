<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\ProductsRepository;

class SiteController extends Controller
{
    protected $modelProduct;
    protected $categoryRepository;
    protected $productsRepository;
    function __construct()
    {
        $this->modelProduct = new Products();
        $this->categoryRepository = new CategoryRepository();
        $this->productsRepository = new ProductsRepository();
    }
    function index()
    {
        $recommendedProduct = $this->productsRepository->shopSlider('views');
        $TopProductByOrder = $this->productsRepository->shopSlider('order');
        $category = $this->categoryRepository->all();
        $products = $this->productsRepository->shop(25, ['order' => 'view', 'by' => 'DESC']);
        return view('pages.site.home', ['TopProductByOrder' => $TopProductByOrder, 'products' => $products, 'recommendedProduct' => $recommendedProduct, 'category' => $category]);
    }
    function page404()
    {
        return view('pages.error.404');
    }
}
