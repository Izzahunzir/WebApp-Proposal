<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'matric_number',
        'sport_type',
        'court_number',
        'booking_date',
        'time_slot',
        'status',
    ];
    
}