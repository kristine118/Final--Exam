@extends('layouts.admin')

@section('content')
    <h2>Edit Service</h2>

    <form action="{{ route('admin.services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   value="{{ $service->title }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      class="form-control">{{ $service->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Icon Class</label>
            <input type="text"
                   name="icon"
                   value="{{ $service->icon }}"
                   class="form-control"
                   >

            <div class="mt-2">
                <strong>Preview:</strong>
                <i class="{{ $service->icon }} fa-2x text-primary"></i>
            </div>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
