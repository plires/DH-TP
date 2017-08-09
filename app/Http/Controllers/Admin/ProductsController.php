<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use App\Image;
use App\Category;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
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

        // dd($url);

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

        return redirect()->action('Admin\ProductsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::with('User', 'Images')->where('id', $id)->get()->first();

        return view('admin/products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->first();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product = Product::find($id);

        if ($request->img == null) {
            $image = $request->img_id;
        } else {
            $imgUrl = $request->file('img')->store('public');
            $url = Storage::url($imgUrl);

            $image = Image::create([
              'src' => $url,
              'product_id' => $product->id
            ]);

            $image = $image->id;
        }
        
        $product->title = $request->title;
        $product->slug = str_slug($request->title);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image_id = $image;
        $product->category_id = $request->category_id;
        $product->available = $request->available;
        $product->save();

        return redirect()->action('Admin\ProductsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Product::find($id)->delete();

        $message = 'El producto fue borrado.';

        if ($request->ajax()) {
            return $message;
        }
        return redirect()->action('Admin\ProductsController@index');
    }
}
