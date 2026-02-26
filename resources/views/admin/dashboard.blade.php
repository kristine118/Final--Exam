@extends('layouts.admin')

@section('content')
    <h1>Dashboard</h1>

    <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Manage Services</a>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Manage Posts</a>
    <a href="{{ route('admin.abouts.index') }}" class="btn btn-primary">Manage Abouts</a>
    <a href="{{ route('admin.team.index') }}" class="btn btn-primary">Manage Teams Member</a>

@endsection
