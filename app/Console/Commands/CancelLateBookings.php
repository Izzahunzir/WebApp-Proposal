<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking; // Moved to top
use Carbon\Carbon;      // Moved to top

class CancelLateBookings extends Command
{

    protected $signature = 'bookings:cancel-late';

    protected $description = 'Automatically cancel bookings if student is 10 minutes late';

    public function handle()
{
     
    $this->info("Current Server Time: " . \Carbon\Carbon::now()->toDateTimeString());
    $this->info("Check against: " . \Carbon\Carbon::today()->toDateString());
    $today = \Carbon\Carbon::today()->toDateString();

    $bookings = \App\Models\Booking::where('status', 'Confirmed')
        ->where('booking_date', $today)
        ->get();

    $cancelledCount = 0;

    foreach ($bookings as $booking) {
        try {
            
            $timeParts = explode(' - ', $booking->time_slot);
            $startTimeString = trim($timeParts[0]); 

            
            $startTime = \Carbon\Carbon::parse($booking->booking_date . ' ' . $startTimeString);

            
            if (\Carbon\Carbon::now()->gt($startTime->addMinutes(10))) {
                $booking->update(['status' => 'Cancelled']);
                $cancelledCount++;
            }
        } catch (\Exception $e) {
            
            $this->error("Could not parse booking ID {$booking->id}: " . $e->getMessage());
            continue;
        }
    }

    $this->info("Process complete. $cancelledCount late bookings were auto-cancelled.");
}
}
