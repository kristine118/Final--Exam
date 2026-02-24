@extends('layouts.front')

@section('content')
    <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 1-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="{{ asset($post->image) }}" alt="" />



                    {{--                    <a href="{{route('front.posts.show', $post->id)}}"><img class="card-img-top" src="{{'/storage/images/'.$post->image?->filename}}" alt="..." /></a>--}}
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">{{$post->title}}</div>
                    <div class="small text-muted">{{$post->created_at->format('M d')}}</div>
                    <a class="btn btn-primary" href="{{route('front.posts.show', $post->id)}}">Read more →</a>
                </div>
            </div>

        </div>
        @endforeach

    </div>

@endsection
