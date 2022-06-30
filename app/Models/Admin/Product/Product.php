<?php

namespace App\Models\Admin\Product;

use App\Models\Admin\Product\FeaturedImage\FearuredImage;
use App\Models\Admin\Product\ProductImage\ProductImage;
use App\Models\Admin\Product\Size\ProductSize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $folderName='uploads/products/thumbnail/';
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'status',
        'summary',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'price',
        'qty',
    ];

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }
    public function featured_images()
    {
        return $this->hasMany(FearuredImage::class, 'product_id');
    }
    public function product_images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}