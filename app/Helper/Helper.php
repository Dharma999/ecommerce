<?php
namespace App\Helper;

use App\Models\Admin\Product\Product;

class Helper 
{
    public static function getImage($id)
    {
        $product = Product::find($id);
        return $product->featured_images[0]->image;
    }
}