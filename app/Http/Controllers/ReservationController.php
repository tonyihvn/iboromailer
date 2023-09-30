<?php

namespace App\Http\Controllers;

// app/Http/Controllers/ReservationController.php

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::all();
        return view('reservations')->with(['reservations'=>$reservations]);
    }
    public function create()
    {
        return view('reservation');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'selected_role' => 'required|string',
            'date_time_arrival' => 'required|date',
            'expectations' => 'required|string',
        ]);

        Reservation::create($validatedData);

        return redirect()->route('reservation-create')->with('message', 'Reservation submitted successfully. See you there!');
    }
}
