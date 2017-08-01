<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Category;
use App\User;
use App\Image;
use App\Product;
use App\Http\Requests\NewProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = Auth::user();
        $products = Product::with('Images')->where('user_id', $id)->get();

        return view('products.index', compact('products' ,'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $user = Auth::user();
        return view('products.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function store(NewProductRequest $request)
      {
          $imgUrl = $request->file('img')->store('public');
          $url = Storage::url($imgUrl);

          $image = Image::create([
            'src' => $url
          ]);

          $id = Auth::id();

          $product = Product::create([
            'title' => request()->title,
            'slug' => str_slug(request()->title),
            'description' => request()->description,
            'price' => request()->price,
            'image_id'=> $image->id,
            'category_id' => request()->category_id,
            'user_id'=> $id,
            'available' => request()->available,
            ]);

          $image->product_id = $product->id;

          $image->save();

          return redirect()->route('products.show', ['id' =>  $product->id]);
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewProductRequest $request, $id)
    {
        $product = Product::find($id);


        $imgUrl = $request->file('img')->store('public');
        $url = Storage::url($imgUrl);

        $image = Image::create([
          'src' => $url
        ]);

        $idUser = Auth::id();

        $product->title = request()->title;
        $product->slug = str_slug(request()->title);
        $product->description = request()->description;
        $product->price = request()->price;
        $product->image_id = $image->id;
        $product->category_id = request()->category_id;
        $product->user_id = $idUser;
        $product->available = request()->available;

        $product->save();


        return redirect()->route('products.show', ['id' =>  $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
