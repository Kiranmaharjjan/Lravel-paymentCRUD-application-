<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Users List</h1>

        <!-- Button to go to payments page -->
        <a href="{{ route('payments.index') }}" class="btn btn-success mb-3">View Payments</a>
        
        <!-- Button to Add New User -->
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
