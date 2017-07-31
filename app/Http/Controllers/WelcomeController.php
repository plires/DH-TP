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
        //$userLogin = Auth::user();
        $products = Product::paginate(9);
        //$users = User::all();
        $images = Image::all();

        $image = Image::where('product_id', '=' , 5)->get();
        //$favorites = User::find(Auth::user()->id)->favorites;

        //return view('prueba', compact('products', 'userLogin', 'users', 'image', 'favorites'));
        return view('welcome', compact('products', 'image'));
    }
}
