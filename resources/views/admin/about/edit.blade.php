@extends('layouts.admin')

@section('content')
    <h2>{{ isset($about) ? 'Edit About' : 'Create About' }}</h2>

    <form action="{{ isset($about) ? route('admin.abouts.update', $about->id) : route('admin.abouts.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($about))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Year</label>
            <input type="text" name="year" value="{{ old('year', $about->year ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $about->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">

            @if(isset($about) && $about->image)
                <img src="{{ asset('storage/'.$about->image) }}" width="100" class="mt-2">
            @endif
        </div>

{{--        <div class="mb-3 form-check">--}}
{{--            <input type="checkbox" name="inverted" class="form-check-input"--}}
{{--                {{ old('inverted', $about->inverted ?? false) ? 'checked' : '' }}>--}}
{{--            <label class="form-check-label">Inverted</label>--}}
{{--        </div>--}}

        <button class="btn btn-primary">{{ isset($about) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
