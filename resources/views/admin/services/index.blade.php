@extends('layouts.admin')

@section('content')
    <h2>Services</h2>

    <a href="{{ route('admin.services.create') }}" class="btn btn-success mb-3">
        Add Service
    </a>

    <table class="table">
        <tr>
            <th>Icon</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>

        @foreach($services as $service)
            <tr>
                <td>
                    <i class="{{ $service->icon }} fa-2x text-primary"></i>
                </td>

                <td>{{ $service->title }}</td>

                <td>
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('admin.services.destroy', $service) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
