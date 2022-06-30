@extends('backend.layouts.app')

@section('content')

<h4 align="center">
    <a href="{{route('category.create')}}">Add Category</a>
</h4>
    <table class="table">
        <thead>
            <th>Category</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        <a href="{{route('category.edit', $category)}}"> Edit </a>
                    </td>
                    <td>
                        <form action="{{route('category.destroy', $category)}}" method="post"> 
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
