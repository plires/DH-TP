<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class SearchOnUserController extends Controller
{
    public function search()
    {
        $parameter = request()->search_term;
        $products = Product::where('title', 'like', '%'.$parameter.'%')->get();
        return $products;
    }
}
