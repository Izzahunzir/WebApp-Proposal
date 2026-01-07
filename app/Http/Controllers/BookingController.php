<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; 
use Carbon\Carbon;      

class BookingController extends Controller
{
    // Step 1: Show the date selection page
    public function selectDate($sport)
    {
        return view('booking.select_date', compact('sport'));
    }




    // Step 2: Show available slots for a specific sport and date
    public function showSlots($sport, $date)
    {
        // Fetch existing bookings for this specific sport and date
        $bookedSlots = Booking::where('sport_type', $sport)
                              ->where('booking_date', $date)
                              ->get();
       
        return view('booking.slots', compact('sport', 'date', 'bookedSlots'));
    }




    // Step 3: Save the booking and show the confirmation modal
    // COMBINED STORE FUNCTION
    public function store(Request $request)
    {
        // 1. Validate
        $validated = $request->validate([
            'sport_type' => 'required',
            'court_number' => 'required',
            'booking_date' => 'required|date',
            'time_slot' => 'required',
        ]);

        // 2. Create the booking
        $booking = Booking::create([
            'user_name' => auth()->user()->name, 
            'matric_number' => auth()->user()->matric_number,
            'sport_type' => $validated['sport_type'],
            'court_number' => $validated['court_number'],
            'booking_date' => $validated['booking_date'],
            'time_slot' => $validated['time_slot'],
            'status' => 'Confirmed', 
        ]);

        // 3. Choose ONE: Redirect to history OR show confirmation
         return view('booking.confirmation', compact('booking'));}

    public function history()
{
    
    $bookings = Booking::where('user_name', auth()->user()->name)
                        ->orderBy('booking_date', 'desc')
                        ->get();


    return view('booking.history', compact('bookings'));
}
public function updateStatus(Request $request, $id)
{
    // Find the booking
    $booking = \App\Models\Booking::findOrFail($id);

    // Update the status from the dropdown
    $booking->status = $request->input('status');
    $booking->save();

    // Redirect back to the staff dashboard with a success message
    return back()->with('status-updated', 'Booking status updated to ' . $booking->status);
}
    


}
