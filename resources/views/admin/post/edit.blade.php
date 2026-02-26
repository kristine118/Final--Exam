@extends('layouts.admin')

@section('content')
    <h2>Edit Portfolio Post</h2>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">

            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
