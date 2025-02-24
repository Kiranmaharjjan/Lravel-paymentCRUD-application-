<!-- resources/views/payments/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Payment</h1>
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="payment_type">Payment Type</label>
                <select name="payment_type" class="form-control" required>
                    <option value="khalti">Khalti</option>
                    <option value="esewa">Esewa</option>
                    <option value="bank">Bank</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" name="payment_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Create Payment</button>
        </form>
    </div>
@endsection
