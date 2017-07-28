<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Image extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'image_id', 'id');
    }

    public function storeImages(Request $request, $id)
    {
        // guardo el archivo
       $product = Product::find($id);
        $file = $request->file('file');
        $ext = $file->extension();
        $name = uniqid();
        $file->storeAs('images/products-'.$product->id, $name.'.'.$ext);
      // persiste en base
      $image = new App\Image(['src' =>'images/products-'.$product->id.'/'.$name.'.'.$ext]);
        $product->images()->save($image);
    }
}
