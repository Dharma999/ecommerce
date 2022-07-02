<?php

namespace App\Http\Controllers\User\Checkout;

use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Models\Order\OrderProduct;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{

    protected $order;
    function __construct(Order $order)
    {
        $this->order = $order;        
    }

    public function index(){
        return view('frontend.checkout');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {

            if ($request->method == 1) {
               $this->cashCheckout($request);
            } else {
                $this->eSewaCheckout($request);
            }
            
            DB::commit();
            Cart::destroy();
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::warning($th->getMessage(), 'OOPs');
            return back();
        }
        Toastr::success('Successfuly Order has been submited', 'Success !!!', ['positionClass'=>'toast-top-right']);
        return redirect('/');

    }
    

    public function cashCheckout(Request $request)
    {
        $input = $request->all();
        $input['order_by'] = \Auth::id();
        $input['order_no'] = rand(00000, 99999);
        $input['subtotal'] = filter_var(Cart::Subtotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $input['tax'] = filter_var(Cart::tax(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $input['total'] = filter_var(Cart::total(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $input['content'] = Cart::content();
        // dd($input);
        $order = $this->order->create($input);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id'=> $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'total'=> $cart->total,
            ]);
        }



    }




    public function eSewaCheckout(Request $request){
        return "esewa";
    }
}