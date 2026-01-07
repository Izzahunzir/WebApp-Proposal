<!DOCTYPE html>
<html>
<head>
    <title>Select Date</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .iium-green { background-color: #386641; }
    </style>
</head>
<body>
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


    <div class="flex flex-1 overflow-hidden">
        <aside class="sidebar">
            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Homepage</a>
                
                <div class="booking-menu">
                    <span class="menu-label">BOOK A COURT</span>
                    <ul class="sport-list">
                        <li><a href="{{ route('booking.select', 'badminton') }}" class="{{ request()->is('*badminton*') ? 'active-sport' : '' }}">Badminton</a></li>
                        <li><a href="{{ route('booking.select', 'netball') }}" class="{{ request()->is('*netball*') ? 'active-sport' : '' }}">Netball</a></li>
                        <li><a href="{{ route('booking.select', 'pingpong') }}" class="{{ request()->is('*pingpong*') ? 'active-sport' : '' }}">Ping Pong</a></li>
                    </ul>
                </div>

                <div class="divider"></div>
                <a href="{{ route('student.profile') }}" class="{{ request()->routeIs('student.profile') ? 'active' : '' }}">My Profile</a>
                <a href="{{ route('student.history') }}" class="{{ request()->routeIs('student.history') ? 'active' : '' }}">Booking History</a>
            </div>
        </aside>

        <main class="main-content flex-1 flex items-center justify-center bg-gray-100">


     
            <div class="bg-white p-8 rounded-2xl shadow-lg w-96">
                <h2 class="text-2xl font-bold mb-6 text-center iium-green text-white py-2 rounded">Choose Date</h2>
                <form id="dateForm" class="space-y-4">
                    <div>
                        <label class="block mb-2 font-bold text-gray-700">Select Booking Date:</label>
                        <input type="date" id="datePicker" min="" required
                            class="w-full p-3 border-2 border-gray-300 rounded-lg focus:border-green-600 outline-none">




                    </div>
                    <button type="button" onclick="goToSlots()"
                            class="w-full iium-green text-white py-3 rounded-lg font-bold hover:bg-green-800 transition">
                        Check Availability
                    </button>
                </form>
            </div>
        </main>
    </div>
</div>


<script>
    function goToSlots() {
        const dateInput = document.getElementById('datePicker');
        const date = dateInput.value;
        if(!date) { 
            alert('Please select a date'); 
            return; 
        }
        
        const sport = "{{ $sport }}";
        window.location.href = "/booking/" + sport + "/" + date;
    }

    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        if(sidebar) {
            sidebar.classList.toggle('collapsed');
        }
    }

    //to not be able to pick past dates
    document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('datePicker');
    
    
    const today = new Date().toISOString().split('T')[0];
    
   
    dateInput.setAttribute('min', today);
    
    
    dateInput.value = today;
});


</script>
</body>
</html>