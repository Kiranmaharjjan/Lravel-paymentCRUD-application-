<!-- resources/views/payments/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Payment</h1>
        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="payment_type">Payment Type</label>
                <select name="payment_type" class="form-control" required>
                    <option value="khalti" {{ $payment->payment_type == 'khalti' ? 'selected' : '' }}>Khalti</option>
                    <option value="esewa" {{ $payment->payment_type == 'esewa' ? 'selected' : '' }}>Esewa</option>
                    <option value="bank" {{ $payment->payment_type == 'bank' ? 'selected' : '' }}>Bank</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $payment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" class="form-control" step="0.01" value="{{ $payment->amount }}" required>
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" name="payment_date" class="form-control" value="{{ $payment->payment_date }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Update Payment</button>
        </form>
    </div>
@endsection
