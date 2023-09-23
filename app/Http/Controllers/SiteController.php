<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $modelProduct;
    function __construct()
    {
        $this->modelProduct = new Products();
    }
    function index()
    {
        $newProduct = $this->modelProduct->latest()->paginate(6);
        $recommendedProduct = $this->modelProduct->latest('views_count', 'desc')->take(12)->get();
        return view('pages.site.home', ['newProduct' => $newProduct, 'recommendedProduct' => $recommendedProduct]);
    }
    function page404()
    {
        return view('pages.error.404');
    }
}
