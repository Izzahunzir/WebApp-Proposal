<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM Female Sport Complex - {{ ucfirst($sport) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gray-200">


<div class="dashboard-wrapper flex flex-col h-screen">


<header class="top-header">
    <div class="header-branding">
        <span class="menu-toggle" onclick="toggleSidebar()">&#9776;</span>

        <img src="{{ asset('images/fsc-logo.png') }}" class="mini-logo" alt="Logo">
        
        <div class="header-text">
            <span class="header-main">IIUM FEMALE</span>
            <span class="header-sub">SPORTS COMPLEX</span>
        </div>
    </div>
    
    <div class="user-profile">
        <a href="{{ route('student.profile') }}">
            <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/profile-pic.png') }}" class="user-avatar">
            <span class="user-name">{{ strtoupper(Auth::user()->name) }}</span>
        </a>
        <a href="{{ route('logout') }}" class="header-logout">LOGOUT</a>
    </div>
</header>


<div class="dashboard-wrapper">
    <aside class="sidebar">
        <div class="nav-links">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Homepage</a>
           
            <div class="booking-menu">
                <span class="menu-label">BOOK A COURT</span>
                <ul class="sport-list">
                    <li>
                        <a href="{{ route('booking.select', 'badminton') }}"
                           class="{{ request()->is('*badminton*') ? 'active-sport' : '' }}">Badminton</a>
                    </li>
                    <li>
                        <a href="{{ route('booking.select', 'netball') }}"
                           class="{{ request()->is('*netball*') ? 'active-sport' : '' }}">Netball</a>
                    </li>
                    <li>
                        <a href="{{ route('booking.select', 'pingpong') }}"
                           class="{{ request()->is('*pingpong*') ? 'active-sport' : '' }}">Ping Pong</a>
                    </li>
                </ul>
            </div>


            <div class="divider"></div>
            <a href="{{ route('student.profile') }}" class="{{ request()->routeIs('student.profile') ? 'active' : '' }}">My Profile</a>
            <a href="{{ route('student.history') }}" class="{{ request()->routeIs('student.history') ? 'active' : '' }}">Booking History</a>
        </div>
    </aside>


    <main class="main-content bg-white shadow-inner" style="overflow-y: auto;">
        <div class="px-10 py-4 text-sm font-bold flex justify-between items-center">
            <nav>
                <span class="text-gray-500">Home ></span>
                <span class="text-gray-500">Book now ></span>
                <span class="text-black">{{ ucfirst($sport) }}</span>
            </nav>
            <a href="/booking/{{ $sport }}" class="text-green-700 hover:underline">← Change Date</a>
        </div>


        <div class="mx-10 iium-green text-white text-center py-3 text-2xl font-medium rounded-sm shadow-sm mb-1">
            {{ ucfirst($sport === 'pingpong' ? 'Ping Pong' : $sport) }}
        </div>


        <div class="mx-10 date-bar text-center py-2 text-lg mb-8 shadow-sm">
            {{ \Carbon\Carbon::parse($date)->format('l j F Y') }}
        </div>


        <div class="px-10 pb-20">
            @for ($i = 1; $i <= 6; $i++)
                <div class="mb-10">
                    <h2 class="text-3xl font-bold mb-4">Court {{ $i }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @php
                            $timeSlots = ['2:00pm - 3:00pm', '3:00pm - 4:00pm', '4:00pm - 5:00pm', '5:00pm - 6:00pm', '8:30pm - 9:30pm', '9:30pm - 10:30pm'];
                        @endphp


                        @foreach ($timeSlots as $slot)
                            @php
                                $isBooked = $bookedSlots->where('court_number', $i)->where('time_slot', $slot)->first();
                            @endphp


                            <form action="/book" method="POST">
                                @csrf
                                <input type="hidden" name="sport_type" value="{{ $sport }}">
                                <input type="hidden" name="court_number" value="{{ $i }}">
                                <input type="hidden" name="booking_date" value="{{ $date }}">
                                <input type="hidden" name="time_slot" value="{{ $slot }}">
                               
                                <button type="submit" {{ $isBooked ? 'disabled' : '' }}
                                    class="w-full p-5 rounded-lg text-center {{ $isBooked ? 'slot-booked' : 'slot-available' }}">
                                    <div class="text-xl font-semibold">{{ $slot }}</div>
                                    <div class="italic text-gray-600">{{ $isBooked ? 'Booked' : 'Available' }}</div>
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
    </main>
</div>


<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        if(sidebar) {
            sidebar.classList.toggle('collapsed');
        }
    }
</script>
</body>
</html>