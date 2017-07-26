<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\DocumentType;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documentType()
    {
      return $this->belongsTo(DocumentType::class, 'document_id', 'id');
    }

    public function products()
    {
      return $this->hasMany(Product::class, 'user_id', 'id');
    }

    public function favorites()
    {
      return $this->belongsToMany(Product::class, 'product_user', 'user_id', 'product_id');
    }
}