<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User; // Import User model

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user')->get(); // Get all payments along with associated user
        return view('payments.index', compact('payments')); // Pass payments to the view
    }

    public function create()
    {
        $users = User::all(); // Get all users to associate payments with
        return view('payments.create', compact('users')); // Pass users to the create view
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'payment_type' => 'required|in:khalti,esewa,bank',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
        ]);

        // Calculate next renewal date
        $nextRenewDate = date('Y-m-d', strtotime($request->payment_date . ' +30 days'));

        // Create a new payment record
        Payment::create([
            'payment_type' => $request->payment_type,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'next_renew_date' => $nextRenewDate,
        ]);

        // Redirect to the payments index page with success message
        return redirect()->route('payments.index')->with('success', 'Payment added successfully.');
    }

    public function edit(Payment $payment)
    {
        $users = User::all(); // Get all users to associate payments with
        return view('payments.edit', compact('payment', 'users')); // Pass payment and users to the edit view
    }

    public function update(Request $request, Payment $payment)
    {
        // Validate incoming data
        $request->validate([
            'payment_type' => 'required|in:khalti,esewa,bank',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
        ]);

        // Update the payment record
        $payment->update([
            'payment_type' => $request->payment_type,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'next_renew_date' => date('Y-m-d', strtotime($request->payment_date . ' +30 days')),
        ]);

        // Redirect to the payments index page with success message
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        // Delete the payment record
        $payment->delete();
        
        // Redirect to the payments index page with success message
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
