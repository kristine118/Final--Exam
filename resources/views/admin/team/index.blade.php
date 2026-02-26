@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3">Add Member</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teamMembers as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->role }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$member->photo) }}" width="80">
                    </td>
                    <td>
                        <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.team.destroy', $member) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
