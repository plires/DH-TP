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
    
}
