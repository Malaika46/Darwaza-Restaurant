<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Contact;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalReservations'  => Reservation::count(),
            'todayReservations'  => Reservation::whereDate('date', today())->count(),
            'totalMessages'      => Contact::count(),
            'recentReservations' => Reservation::latest()->take(10)->get(),
        ]);
    }

    public function reservations()
    {
        return view('admin.reservations', [
            'reservations' => Reservation::latest()->paginate(20),
        ]);
    }

    public function messages()
    {
        return view('admin.messages', [
            'messages' => Contact::latest()->paginate(20),
        ]);
    }
}
