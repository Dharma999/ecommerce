<?php

namespace App\Http\Controllers\Frontend\Cart;

use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use GrahamCampbell\ResultType\Success;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.cart');
    }
    //
    public function addToCart($slug)
    {
        $product = Product::where('slug', $slug)->first();
        Cart::add($product->id, $product->title, 1, $product->price);
        Toastr::success('Successfully Added', 'success !!!', ['positionClass'=>'toast-top-right']);
        

        return redirect()->route('cart.index');
    }
    public function getCart()
    {
        $carts = Cart::content();

        $data = [
            'carts' => $carts,
        ];
        return view('frontend.cart', $data);

    }
    public function cartUpdate(Request $request, $rowId)
    {

        Cart::update($rowId, $request->qty);
        return redirect()->route('cart.index');

    }
    
    public function removeCart(Request $request, $rowId)
    {
        Cart::remove($rowId);
        Toastr::success('Successfully Removed', 'Removed Product !', ['positionClass'=>'toast-top-right']);
        return redirect()->route('cart.index');
    }
}
