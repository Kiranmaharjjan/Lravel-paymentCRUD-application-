<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (leave empty to keep current)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success mt-3">Update User</button>
        </form>
    </div>
@endsection
