@extends('backend.layouts.app')
@section('content')
<h3 align="center"><a href="{{route('product.create')}}">Add Product</a></h3>
<table class="table"> 
    <thead>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
     @foreach ($products as $product)
         <tr>
            <td>
                {{$product->title}}
            </td>
            <td>
               <img src="{{asset('uploads/products/thumbnail/'. $product->featured_images[0]->image)}}" alt="Image not found">
            </td>
            <td>
               <a href="{{route('product.edit', $product)}}">Edit</a>
            </td>
            <td>
                <form action="{{route('product.destroy', $product)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
                </form>
            </td>
         </tr>
     @endforeach
    </tbody>
</table>

@endsection