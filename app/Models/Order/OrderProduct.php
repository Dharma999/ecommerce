<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
        'total',
    ];
    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
