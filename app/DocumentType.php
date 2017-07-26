<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DocumentType extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->hasMany(User::class, 'document_id', 'id');
    }
}
