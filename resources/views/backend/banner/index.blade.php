@extends('backend.layouts.app')

@section('content')
    <table class="table">
        <thead>
            <th>Title</th>
            <th>Slugan</th>
            <th>Image</th>
            <th colspan="3">Status</th>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->title }}</td>

                    <td>{{ $banner->slugan }}</td>

                    <td>
                        <img src="{{asset('uploads/banner/thumbnail/'.$banner->image)}}" alt="Image not found" height="100" width="200">
                    </td>

                    <td>{{ $banner->status }}</td>

                    <td>
                        <a href="{{route('banner.edit', $banner)}}">Edit</a>
                    </td>

                    <td>
                        <form action="{{route('banner.destroy', $banner)}}" method="POST">
                        @method('DELETE')
                        @csrf
                       <button type="submit" class="btn btn-link"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
