<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Allow mass assignment for these columns
    protected $fillable = [
        'payment_type',
        'user_id',
        'amount',
        'payment_date',
        'next_renew_date',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
