<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Image;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLogin = Auth::user();
        $products = Product::paginate(9);
        $users = User::all();
        $images = Image::all();

        $image = Image::where('product_id', '=', 5)->get();

        $favorites = User::with('favorites')->get()->find(Auth::user()->id)->favorites->pluck('id')->toarray();

        return view('home', compact('products', 'userLogin', 'users', 'image', 'favorites'));
    }
}
