<!-- resources/views/payments/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payments List</h1>
        <a href="{{ route('users.index') }}" class="btn btn-success mb-3">View Users</a>
        <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Add New Payment</a>

   
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Payment Type</th>
                    <th>Amount</th>
                    <th>User</th>
                    <th>Payment Date</th>
                    <th>Next Renewal Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->payment_type }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->user->name }}</td>
                        <td>{{ $payment->payment_date }}</td>
                        <td>{{ $payment->next_renew_date }}</td>
                        <td>
                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="d-inline">
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
