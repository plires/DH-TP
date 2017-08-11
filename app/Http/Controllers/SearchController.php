<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function search()
    {
        $parameter = request()->search_term;
        $products = Product::where('title', 'like', '%'.$parameter.'%')->get();
        return $products;
    }
}
