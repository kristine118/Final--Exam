@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $team->name }}" class="form-control mb-2">
            <input type="text" name="role" value="{{ $team->role }}" class="form-control mb-2">
            @if($team->photo)
                <img src="{{ asset('storage/'.$team->photo) }}" width="120" class="mb-2">
            @endif

            <input type="file" name="photo" class="form-control mb-2">
            <input type="text" name="twitter" value="{{ $team->twitter }}" class="form-control mb-2">
            <input type="text" name="facebook" value="{{ $team->facebook }}" class="form-control mb-2">
            <input type="text" name="linkedin" value="{{ $team->linkedin }}" class="form-control mb-2">

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
