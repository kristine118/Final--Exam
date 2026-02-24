@extends('layouts.front')

@push('header')

    @include('front.components.header')

@endpush

@section('content')
    @include('front.pages.home.components.service')
    @include('front.pages.home.components.portfolio')
    @include('front.pages.home.components.about', ['abouts' => $abouts])
    @include('front.pages.home.components.team')
    @include('front.pages.home.components.contact')
@endsection


