<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use App\Image;


class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
      return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images()
    {
      return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function favorites()
    {
      return $this->belongsToMany(User::class, 'product_user', 'product_id', 'user_id');
    }
}