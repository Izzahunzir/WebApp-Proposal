@extends('layouts.staff_layout')


@section('content')
<div class="search-container" style="margin-bottom: 20px;">
    <form action="{{ route('staff.dashboard') }}" method="GET">
        <input type="text" name="search" placeholder="Search Name or Matric..."
               value="{{ request('search') }}"
               style="padding: 10px; width: 300px; border-radius: 5px; border: 1px solid #ccc;">
        <button type="submit" style="padding: 10px 20px; background-color: #1e3e0eff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Search
        </button>
        <a href="{{ route('staff.dashboard') }}" style="margin-left: 10px; color: gray;">Clear</a>
    </form>
</div>


<div class="content-body staff-dashboard">
    <h2 class="dashboard-title">Booking Details</h2>


    <div class="booking-container">
        <div class="table-responsive">
            <table class="staff-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Matric No</th>
                        <th>Sports</th>
                        <th>Court</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Delete</th> </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->user_name }}</td>
                        <td class="matric-text">{{ $booking->matric_number ?? 'N/A' }}</td>
                        <td><span class="pill-gray">{{ ucfirst($booking->sport_type) }} </span></td>
                        <td><span class="pill-gray">Court {{ $booking->court_number }} </span></td>
                        <td><span class="pill-gray">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</span></td>
                        <td>{{ $booking->time_slot }}</td>
                       
                        <td class="status-cell">
                            <div class="custom-dropdown">
                                <div class="dropdown-trigger status-{{ strtolower(str_replace([' ', '-'], '', $booking->status)) }}" onclick="toggleMenu({{ $booking->id }})">
                                    <span>
                                        <span class="status-icon bg-{{ strtolower(str_replace([' ', '-'], '', $booking->status)) }}"></span>
                                        {{ $booking->status }}
                                    </span>
                                    <small style="margin-left: 10px;">▼</small>
                                </div>


                                <ul class="dropdown-menu" id="menu-{{ $booking->id }}">
                                    <li class="status-confirmed" onclick="submitStatus({{ $booking->id }}, 'Confirmed')">
                                        <span class="status-icon bg-confirmed"></span> Confirmed
                                    </li>


                                    <li class="status-checkin" onclick="submitStatus(
                                        {{ $booking->id }},
                                        'Check-In',
                                        '{{ addslashes($booking->user_name) }}',
                                        '{{ $booking->matric_number }}',
                                        '{{ ucfirst($booking->sport_type) }}',
                                        'Court {{ $booking->court_number }}',
                                        '{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}',
                                        '{{ $booking->time_slot }}'
                                    )">
                                        <span class="status-icon bg-checkin"></span> Check-In
                                    </li>


                                    <li class="status-cancelled" onclick="submitStatus({{ $booking->id }}, 'Cancelled')">
                                        <span class="status-icon bg-cancelled"></span> Cancelled
                                    </li>
                                </ul>


                                <form id="form-{{ $booking->id }}" action="{{ route('status.update', $booking->id) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" id="input-{{ $booking->id }}">
                                </form>
                            </div>
                        </td>
                       
<td class="delete" style="border-bottom: 1px solid #eee; border-left: none; padding: 10px; text-align: center;">
    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to PERMANENTLY delete this booking?')">
        @csrf
        @method('DELETE')
        <button type="submit"
                style="background-color: #dc3545; color: white; padding: 6px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 12px;">
            DELETE
        </button>
    </form>
</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="confirmModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-check-icon">✔</div>
        </div>
        <div class="modal-body">
            <p><strong>Name:</strong> <span id="display-name"></span></p>
            <p><strong>Matric No:</strong> <span id="display-matric"></span></p>
            <p><strong>Sport:</strong> <span id="display-sport"></span></p>
            <p><strong>Court:</strong> <span id="display-court"></span></p>
            <p><strong>Date:</strong> <span id="display-date"></span></p>
            <p><strong>Time:</strong> <span id="display-time"></span></p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancel</button>
            <button class="btn-confirm" id="finalConfirmBtn">Confirm</button>
        </div>
    </div>
</div>


<script>
let currentBookingId = null;
let currentStatus = null;


function toggleMenu(id) {
    // Close other open menus
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        if(menu.id !== 'menu-'+id) menu.style.display = 'none';
    });
    const menu = document.getElementById('menu-' + id);
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}


function submitStatus(id, status, name = '', matric = '', sport = '', court = '', date = '', time = '') {
    if (status !== 'Check-In') {
        document.getElementById('input-' + id).value = status;
        document.getElementById('form-' + id).submit();
        return;
    }


    currentBookingId = id;
    currentStatus = status;


    document.getElementById('display-name').innerText = name;
    document.getElementById('display-matric').innerText = matric;
    document.getElementById('display-sport').innerText = sport;
    document.getElementById('display-court').innerText = court;
    document.getElementById('display-date').innerText = date;
    document.getElementById('display-time').innerText = time;


    document.getElementById('confirmModal').style.display = 'flex';
}


function closeModal() {
    document.getElementById('confirmModal').style.display = 'none';
}


document.getElementById('finalConfirmBtn').onclick = function() {
    if (currentBookingId && currentStatus) {
        document.getElementById('input-' + currentBookingId).value = currentStatus;
        document.getElementById('form-' + currentBookingId).submit();
    }
};


window.onclick = function(event) {
    if (!event.target.closest('.custom-dropdown')) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.style.display = 'none');
    }
}
</script>
@endsection
