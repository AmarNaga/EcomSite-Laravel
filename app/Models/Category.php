<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use  \TCG\Voyager\Traits\Translatable;
use App\Models\Product;

class Category extends Model
{

    protected $table = 'category';
    Use Translatable;
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
