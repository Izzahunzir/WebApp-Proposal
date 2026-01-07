<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
</style>

@extends('layouts.app')

@section('content')
<style>
   
    body, html {
        overflow: hidden !important;
        height: 100vh;
        margin: 0;
    }

    .dashboard-wrapper {
        display: flex;
        height: calc(100vh - 60px); 
        width: 100%;
        overflow: hidden;
    }

    
    .profile-page-bg {
        flex: 1;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url("{{ asset('images/welcome-bg.png') }}"); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center; 
        align-items: center;     
        padding: 20px;
        overflow: hidden;
        position: relative;
    }

   
    .profile-inner-container {
        width: 100%;
        max-width: 600px; 
        display: flex;
        flex-direction: column;
        align-items: flex-start; 
    }

    
    .profile-card {
    background: rgba(255, 255, 255, 0.9) !important;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    padding: 20px 20px 20px 30px; 
    width: 100%;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.4);
    color: #2D5A43; 
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif !important;
}

    /* 5. Typography and Elements */
    .breadcrumb-nav {
        margin-bottom: 10px;
        font-size: 0.9rem;
    }
    .breadcrumb-nav a, .breadcrumb-nav span {
        color: rgba(255, 255, 255, 0.8) !important;
        text-decoration: none;
    }

    .profile-title-text {
        color: white;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
        font-family: 'Tenor Sans', sans-serif !important;
    }

    .display-name {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 15px;
        letter-spacing: 1px;
        font-family: 'Montserrat', sans-serif;
    }


    .profile-img-box {
        display: flex;
        justify-content: center; 
        align-items: center;     
        width: 100%;             
        margin-bottom: 15px;
    }

    .profile-img-box img {
        width: 85px;            
        height: 85px;           
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #2D5A43;
        display: block;         
    }



    .user-status {
        font-weight: 800;
        letter-spacing: 2px;
        margin-bottom: 20px;
        color: #2D5A43;
    }

   .info-footer {
        font-family: 'Montserrat', sans-serif !important;
        text-align: left;
        border-top: 1px solid rgba(45, 90, 67, 0.2);
        padding-top: 15px; 
        font-size: 0.95rem; 
        line-height: 1.6;   
    }
</style>

<div class="dashboard-wrapper">
    <aside class="sidebar">
        <div class="nav-links">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Homepage</a>
            <div class="booking-menu">
                <span class="menu-label" style="padding: 10px 30px; color: #ccc; font-size: 0.7rem;">BOOK A COURT</span>
                <ul class="sport-list" style="list-style: none; padding: 0;">
                    <li><a href="{{ route('booking.select', 'badminton') }}">Badminton</a></li>
                    <li><a href="{{ route('booking.select', 'netball') }}">Netball</a></li>
                    <li><a href="{{ route('booking.select', 'pingpong') }}">Ping Pong</a></li>
                </ul>
            </div>
            <div class="divider"></div>
            <a href="{{ route('student.profile') }}" class="{{ request()->routeIs('student.profile') ? 'active' : '' }}">My Profile</a>
            <a href="{{ route('student.history') }}" class="{{ request()->routeIs('student.history') ? 'active' : '' }}">Booking History</a>
        </div>
    </aside>

    <main class="profile-page-bg">
        <div class="profile-inner-container">
            <nav class="breadcrumb-nav">
                <a href="{{ route('dashboard') }}">Home</a>
                <span> > </span>
                <span style="color: white; font-weight: bold;">My Profile</span>
            </nav>

            <h1 class="profile-title-text">My Profile</h1>

            <div class="profile-card">
                <h2 class="display-name">{{ strtoupper($user->name) }}</h2>
                
                <div class="profile-img-box">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="User Photo">
                    @else
                        <img src="{{ asset('images/profile-pic.png') }}" alt="User Icon">
                    @endif
                </div>

                <div class="user-status">ACTIVE (STUDENT)</div>

                <div class="info-footer">
                    <p><strong>MATRIC NO: {{ $user->matric_number }}</strong></p>
                    <p>EMAIL: {{ strtoupper($user->email) }}</p>
                    <p>KULLIYYAH OF INFORMATION & COMMUNICATION TECHNOLOGY</p>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
}
</script>
@endsection


