@extends('layouts.admin')

@section('content')
    <h2>About Timeline</h2>

    <a href="{{ route('admin.abouts.create') }}" class="btn btn-success mb-3">Add New About</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Year</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>

        </tr>
        </thead>
        <tbody>
        @foreach($abouts as $about)
            <tr>
                <td>{{ $about->year }}</td>
                <td>{{ $about->title }}</td>
                <td>{{ Str::limit($about->description, 50) }}</td>
                <td>
                    @if($about->image)
                        <img src="{{ asset('storage/'.$about->image) }}" width="50">
                    @endif
                </td>
{{--                <td>{{ $about->inverted ? 'Yes' : 'No' }}</td>--}}
                <td>
                    <a href="{{ route('admin.abouts.edit', $about->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
