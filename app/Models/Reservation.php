<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'phone', 'date', 'time',
        'guests', 'room', 'notes', 'secret_code',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
