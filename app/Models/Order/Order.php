<?php
namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        //dafault on form
        'order_by',
        'name',
        'method',
        'email',
        'contact',
        'address_line1',
        'address_line2',

        //detail of order
        'order_no',
        'subtotal',
        'tax',
        'total',
        'content',
        'status',
    ];
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
