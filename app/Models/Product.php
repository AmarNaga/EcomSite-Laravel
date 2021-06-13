<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use  \TCG\Voyager\Traits\Translatable;
use App\Models\category;

class Product extends Model
{
    // Use Translatable;
    // use HasFactory;

    // protected $fillable = [
    // 'product_name',
    // 'product_desc',
    // 'price',
    // 'category_id',
    // 'image'
    // ];
    // protected $attributes = [
    //     'image' => ' ',
    // ];
    
    // //fetches category table along with product table for faster fetching 
    // protected $with = ['category'];

    public function category(){ //category id
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsToMany(Category::class);
    }

    public function scopehotItem($query){
        return $query->inRandomOrder()->take(4);
    }

}
