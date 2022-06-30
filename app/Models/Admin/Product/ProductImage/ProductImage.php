<?php
namespace App\Models\Admin\Product\ProductImage;

use App\Models\Admin\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'image',
        'color',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
