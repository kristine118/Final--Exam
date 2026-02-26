@extends('layouts.admin')

@section('content')
    <h2>Portfolio Posts</h2>

    <a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-3">
        Add Post
    </a>

    <table class="table">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>

        @foreach($posts as $post)
            <tr>
                <td>
                    @if($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}" width="80">
                    @endif
                </td>

                <td>{{ $post->title }}</td>

                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
