@extends('layouts.app')


@section('content')


<style>
    /* 1. Allow the main content area to scroll vertically */
    .main-content {
        overflow-y: auto !important;
        height: calc(100vh - 60px); /* Adjust based on your top-header height */
    }

    /* 2. Ensure the wrapper doesn't cut off the content */
    .dashboard-wrapper {
        overflow: hidden;
    }

    /* 3. Optional: Make the scrollbar look cleaner */
    .main-content::-webkit-scrollbar {
        width: 8px;
    }
    .main-content::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .main-content::-webkit-scrollbar-thumb {
        background: #386641; 
        border-radius: 10px;
    }
</style>



<div class="dashboard-wrapper">
    <aside class="sidebar">
        <div class="nav-links">
            <a href="{{ route('dashboard') }}">Homepage</a>
            <div class="booking-menu">
                <span class="menu-label">BOOK A COURT</span>
                <ul class="sport-list">
                    <li><a href="{{ route('booking.select', 'badminton') }}">Badminton</a></li>
                    <li><a href="{{ route('booking.select', 'netball') }}">Netball</a></li>
                    <li><a href="{{ route('booking.select', 'pingpong') }}">Ping Pong</a></li>
                </ul>
            </div>
            <div class="divider"></div>
            <a href="{{ route('student.profile') }}">My Profile</a>
            <a href="{{ route('student.history') }}" class="active">Booking History</a>
        </div>
    </aside>


    <main class="main-content bg-white">
    <div class="history-container" style="padding: 50px 70px;">
       
        <nav class="breadcrumb-nav">
            <a href="{{ route('dashboard') }}">Home</a>
            <span class="text-gray-400">></span>
            <span class="breadcrumb-current">Booking History</span>
        </nav>


        <h1 class="history-title-dark">
            My Booking History
        </h1>


        <div class="table-wrapper">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Sports</th>
                        <th>Court</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td>
                            <span class="data-badge">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                            </span>
                        </td>
                        <td class="font-semibold text-gray-700">
                            {{ $booking->time_slot }}
                        </td>
                        <td>
                            <span class="data-badge">
                                {{ ucfirst($booking->sport_type) }}
                            </span>
                        </td>
                        <td>
                            <span class="data-badge">
                                Court {{ $booking->court_number }}
                            </span>
                        </td>
                        <td>
                            @if($booking->status == 'cancelled')
                                <span class="status-cancelled">Cancelled</span>
                            @else
                                <span class="status-confirmed">Confirmed</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-500">
                            No booking history found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>


<script>
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    // We check if it exists first to avoid errors
    if(sidebar) {
        sidebar.classList.toggle('collapsed');
    }
}
</script>


@endsection
