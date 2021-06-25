<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;
use App\Models\product;

class ProductsController extends Controller
{
    public function products_listing_view(Request $Request){

        $all_products = product::select('*')->get();
        return view('product_listing', ['all_products' => $all_products]);
    }

    public function products_view(Request $Request){
        return view('product');
    }
}
