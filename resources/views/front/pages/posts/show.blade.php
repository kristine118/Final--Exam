@extends('layouts.front')

{{--@push('header')--}}
{{--@include('front.components.header')--}}
{{--@endpush--}}

@section('content')


    <div class="container py-5">
        <div class="row">
            <div class="col-sm-6 mb-4">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         class="img-fluid"
                         alt="{{ $post->title }}">
                @endif

                <h1 class="mb-3">{{ $post->title }}</h1>

                <p class="text-muted">
                    {{ $post->created_at->format('M d, Y') }}
                </p>

                <hr>

                <div class="mt-4">
                    {{ $post->content }}
                </div>

                <a href="/" class="btn btn-secondary mt-4">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>

@endsection
