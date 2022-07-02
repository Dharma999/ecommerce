@extends('frontend.layouts.app')

@section('content')

<div class="container" style="height: 100px;">
    <h3 class="mt-5 text-center" style="text-transform: uppercase;">
        -----CheckOut-----
    </h3>
</div>

<div class="container-fluid">
<div class="row">

    <div class="col-md-2 col-sm-12">
    </div>
    <div class="col-md-8 col-sm-12">
        <form action="{{route('checkout.store')}}" method="POST">
            @csrf

            <label for="payment" style="margin-right: 50px;"> <strong>Payement methods</strong></label>

           <label for="payments">
            <input type="radio", name="method" checked value="1"> Cash on Delivery
            <input type="radio" name="method" value="2"> e-Sewa
           </label>

           <div class="form-group">

         
                <label for="name"class="mt-3">First Name:</label>
                <input type="text" name="name" class="form-control">
                <label for="email" class="mt-3">Email:</label>
                <input type="text" name="email" class="form-control">
                <label for="contact" class="mt-3">Contact:</label>
                <input type="text" name="contact" class="form-control">
                <label for="address1" class="mt-3">Address line 1</label>
                <input type="text" name="address_line1" class="form-control">
                <label for="email" class="mt-3">Address line 2</label>
                <input type="text" name="address_line2" class="form-control">

                <button type="submit" class="btn btn-primary float-end mt-2"> Submit </button>
            </div>
            </form>
    </div>
   
</div>
</div>


@endsection