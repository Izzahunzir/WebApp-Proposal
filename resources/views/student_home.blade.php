@extends('layouts.app')
@section('content')


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
        <a href="{{ route('student.history') }}" class="{{ request()->routeIs('booking.history') ? 'active' : '' }}">Booking History</a>
    </div>
</aside>
    <main class="main-content">
        <section class="content-body">
            <h2 class="section-title">PICK YOUR SPORT</h2>
           <div class="sport-grid">
    <div class="sport-card">
        <img src="{{ asset('images/badminton.png') }}" alt="Badminton">
        <div class="sport-label">BADMINTON</div>
        <a href="{{ route('booking.select', 'badminton') }}" class="btn-book">BOOK NOW</a>
    </div>


    <div class="sport-card">
        <img src="{{ asset('images/netball.png') }}" alt="Netball">
        <div class="sport-label">NETBALL</div>
        <a href="{{ route('booking.select', 'netball') }}" class="btn-book">BOOK NOW</a>
    </div>


    <div class="sport-card">
        <img src="{{ asset('images/pingpong.png') }}" alt="Ping Pong">
        <div class="sport-label">PING PONG</div>
        <a href="{{ route('booking.select', 'pingpong') }}" class="btn-book">BOOK NOW</a>
    </div>
</div>
        </section>
    </main>
</div>


<script>
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
}
</script>


@endsection
