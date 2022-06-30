<?php

namespace App\Models\Admin\Product\Size;

use App\Models\Admin\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSize extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'size',
    ];
    public function product()
    {
        $this->belongsTo(Product::class, 'product_id');
    }
}
