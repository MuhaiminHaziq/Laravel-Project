<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookings = Booking::all();
        return view('booking', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required | email',
            'booking_code' => 'required',
            'room_id' => 'required',
        ]);

        $booking = Booking::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'booking_code' => $request->booking_code,
            'room_id' => $request->room_id,
        ]);
        return redirect()->route('booking')->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $booking = Booking::find($id);
        // dd($id, $booking);
        return view('editbook', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request, $id);
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required | email',
            'booking_code' => 'required',
            'room_id' => 'required',
        ]);

        $booking = Booking::find($id);
        $booking->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'booking_code' => $request->booking_code,
            'room_id' => $request->room_id,
        ]);
        return redirect()->route('booking')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('booking')->with('success', 'Booking deleted successfully.');
    }
}
