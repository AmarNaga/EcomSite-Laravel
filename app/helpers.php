<?php
use Intervention\Image\Facades\Image;
use App\Models\Category;

if(!function_exists('image_crop')){
    function image_crop( $image, $width = 550, $height = 750 ){
        if(
            file_exists(storage_path('app/public/images/'.$image)) && 
            !file_exists(storage_path('app/public/images/thumbnails/'.$image))
        ){
            $image_resize = Image::make(storage_path('app/public/images/'.$image));
            $image_resize->resize($width, $height);
            $image_resize->save(storage_path('app/public/images/thumbnails/'.$image));
        } 
        return asset('storage/images/thumbnails/'.$image);
    }
}

if(!function_exists('categories_list')){
    function categories_list(){
        // return Category::where('parent_id', 0)->get();
        return Category::whereParentId(0)->get();
    }
}