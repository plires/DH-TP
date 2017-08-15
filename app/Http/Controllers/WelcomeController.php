<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Image;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        $images = Image::all();

        if (Auth::user()) {
            $users = User::all();
            $image = Image::where('product_id', '=', 5)->get();
            $favorites = User::with('favorites')->get()->find(Auth::user()->id)->favorites->pluck('id')->toarray();
        }



        return view('welcome', compact('products', 'images', 'users', 'image', 'favorites'));
    }
}
