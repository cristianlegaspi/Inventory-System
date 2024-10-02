<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $product = Product::all();
        $product = Product::paginate(10);
        return Inertia::render('Product/index',  ['products' => $product]);
    }


}
