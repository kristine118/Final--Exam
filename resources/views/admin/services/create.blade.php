@extends('layouts.admin')

@section('content')
    <h2>Add Portfolio Post</h2>

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Icon Class</label>
            <input type="text" name="icon" class="form-control"
            >
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
@endsection
