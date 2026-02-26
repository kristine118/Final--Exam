@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" placeholder="Name" class="form-control mb-2">
            <input type="text" name="role" placeholder="Role" class="form-control mb-2">
            <input type="file" name="photo" class="form-control mb-2">
            <input type="text" name="twitter" placeholder="Twitter URL" class="form-control mb-2">
            <input type="text" name="facebook" placeholder="Facebook URL" class="form-control mb-2">
            <input type="text" name="linkedin" placeholder="LinkedIn URL" class="form-control mb-2">

            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
