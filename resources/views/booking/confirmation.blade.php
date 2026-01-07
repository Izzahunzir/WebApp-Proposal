<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        
        .modal-bg { background-color: #E6F4EA; } /* Light green card */
        .check-circle { background-color: #386641; } 
        .btn-home { background-color: #386641; color: white; }
        .btn-home:hover { background-color: #2D5235; }
       
        
        .overlay {
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(2px);
        }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden">

<div class="absolute inset-0 overlay flex items-center justify-center p-4">
    <div class="modal-bg w-full max-w-sm rounded-[35px] p-8 shadow-2xl relative flex flex-col items-center">
        
        <div class="check-circle w-20 h-20 rounded-full flex items-center justify-center mb-4">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-2xl font-bold text-gray-900 mb-2">Booking Confirmed!</h1>

        <div class="text-center space-y-0 text-lg text-gray-800 mb-4 font-semibold">
            <p>{{ strtoupper($booking->sport_type) }}</p>
            <p>Court {{ $booking->court_number }}</p>
            <p>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }}</p>
        </div>

        <p class="text-red-600 text-[11px] italic text-center leading-tight mb-6 px-4">
            Reminder: please bring your matric card for double confirmation and come within 15 minutes to avoid cancellation.
        </p>

        <a href="{{ route('dashboard') }}"
           class="inline-block px-10 py-2.5 text-white font-bold rounded-full transition-transform hover:scale-105"
           style="background-color: #386641; text-decoration: none;">
           Return to Homepage
        </a>
    </div>
</div>


</body>
</html>
