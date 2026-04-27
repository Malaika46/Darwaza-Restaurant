<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Contact;
use Illuminate\Http\Request;

class DarwazaController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function menu()
    {
        return view('menu');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function reservationForm()
    {
        return view('reservation');
    }

    public function reservationStore(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:100',
            'phone'  => 'required|string|max:20',
            'date'   => 'required|date|after_or_equal:today',
            'time'   => 'required|string',
            'guests' => 'required|integer|min:1|max:20',
            'room'   => 'required|in:mughal,colonial,azadi',
            'notes'  => 'nullable|string|max:500',
        ]);

        // Generate unique DRZ secret code
        do {
            $code = 'DRZ-' . strtoupper(substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 4));
        } while (Reservation::where('secret_code', $code)->exists());

        $validated['secret_code'] = $code;

        Reservation::create($validated);

        return redirect('/reservation')
            ->with('success', true)
            ->with('code', $code);
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($validated);

        return redirect('/contact')->with('success', 'Thank you! We\'ll get back to you soon.');
    }
}
