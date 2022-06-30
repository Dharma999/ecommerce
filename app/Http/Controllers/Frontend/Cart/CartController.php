<?php

namespace App\Http\Controllers\Frontend\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Kamaln7\Toastr\Facades\Toastr;

class CartController extends Controller
{
    //
    public function addToCart($slug)
    {
        $product = Product::where('slug', $slug)->first();
        Cart::add($product->id, $product->title, 1, $product->price);
        Toastr::success('Successfully Added', 'success !!!', ['positionClass'=>'toast-top-right']);
        return redirect('/');
        // return redirect()->route('cart.index');
    }
    public function getCart()
    {
        return Cart::content();
    }
}
