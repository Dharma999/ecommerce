@extends('backend.layouts.app');
@section('content')
    <table class="table">
        <thead>
            <th>Title</th>
            <th>Image</th>
            <th>Content</th>
            <th>Slug</th>
            <th>Description</th>
            <th colspan="3">Status</th>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <img src="{{ asset('uploads/blog/thumbnail/' . $blog->image) }}" alt="Image Not Found" height="100"
                            width="200">
                    </td>
                    <td>{{ $blog->content }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td>{{ $blog->summary }}</td>
                    <td>{{$blog->status}}</td>
                    <td>
                        <a href="{{ route('blog.edit', $blog) }}"> Edit </a>
                    </td>

                    <td>
                        <form action="{{ route('blog.destroy', $blog) }}" method="POST">
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
