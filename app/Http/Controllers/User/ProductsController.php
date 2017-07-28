<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Category;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
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

          $product = Product::create([
            'title' => request()->title,
            'slug' => str_slug(request()->title),
            'description' => request()->description,
            'price' => request()->price,
            'image_id'=> $image->id,
            'category_id' => request()->category_id,
            'user_id'=> 2,
            'available' => request()->available,
            ]);

          $image->product_id = $product->id;

          $image->save();


          return redirect()->route('products.create');
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

        $img = Image::find($product->image_id);


        return view('products.show', compact('product', 'img'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
