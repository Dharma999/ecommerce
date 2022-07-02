@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid" style="height: 300px;">

    <h3 class="mt-5 text-center" style="text-transform: uppercase;">
        --Your Shopping Cart--
    </h3>

</div>

<div class="row">
    <div class="col-md-7 col-sm-12">
        <table class="table">
            <thead>
                <th>
                    Products
                </th>
                <th>
                    Price
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Total
                </th>
                <th>
                    Remove
                </th>
            </thead>
            <tbody>

                @foreach ($carts as $cart)

                <tr>
                    <td>

                        <div class="row">
                            <div style="display: flex;">
                                <img src="{{asset('uploads/products/thumbnail/'.App\Helper\Helper::getImage($cart->id))}}" alt="Img" style="height: 50px; width: auto;">
                                {{$cart->name}}
                            </div>
                        </div>
                    
                        
                    </td>
                    <td>
                        NRs: {{$cart->price}}
                    </td>
                    <td>
                        <form action="{{route('cart.update', $cart->rowId)}}" method="post">
                            @method('PATCH')
                            @csrf
                              <div class="row">
                                <input type="number" value="{{$cart->qty}}" name="qty" style="width: 50%">
                                <button type="submit" style="display: inline-block; width: 50%;">Update</button>
                              </div>
                           
                        </form>
                    </td>
                    <td>
                        {{$cart->price * $cart->qty}}
                    </td>
                    <td>
                       <a href="{{route('view.removeCart', $cart->rowId)}}"> <i class="fa fa-times"></i></a>
                    </td>
                </tr>
                    
                @endforeach

               

            </tbody>
        </table>
    </div>
    <div class="col-md-5 col-sm-12">
        <div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Coupan Code">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">Apply Coupan</span>
                </div>
              </div>
        </div>
        <div>
            <table class="table">
                <thead>
                    <th style="">
                        Cart Summary
                    </th>
                    <th>
                        Price
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td>
                            NRS {{Cart::Subtotal();}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Shipping
                        </td>
                        <td>
                            NRS 0
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Total</strong>
                        </td>
                        <td>
                            NRS {{Cart::Subtotal();}}
                        </td>
                    </tr>
                    <tr>
                      <td> 
                        <a href="{{route('checkout.index')}}" class="btn btn-primary form-control"> Check Out </a>
                      </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>
    
@endsection