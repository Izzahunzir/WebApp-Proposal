<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
</style>

@extends('layouts.staff_layout')

@section('content')
<style>
    /*global*/
    body, html {
        overflow: hidden;
        height: 100vh;
        margin: 0;
    }

    
    .profile-page-bg {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url("{{ asset('images/welcome-bg.png') }}"); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        
        display: flex;
        justify-content: center; 
        align-items: center;     
        
        height: calc(100vh - 60px); 
        width: calc(100% + 40px);   
        margin: -20px;              
        overflow: hidden;
    }

   
    .profile-inner-container {
        width: 100%;
        max-width: 550px; 
        display: flex;
        flex-direction: column;
        align-items: flex-start; 
        justify-content: center;
        margin: 0 auto; 
}


    .breadcrumb-nav, 
    .staff-profile-title {
        width: 100%;
        text-align: left; 
        display: block;
        margin-left: 0;
}

    .breadcrumb-nav { margin-bottom: 5px; }
    .breadcrumb-nav a, .breadcrumb-nav span {
        color: rgba(255, 255, 255, 0.8) !important;
        font-size: 0.85rem;
        text-decoration: none;
    }

    .staff-profile-title {
        color: white; 
        font-size: 1.8rem; 
        font-weight: bold; 
        margin-bottom: 15px;
        margin-top: 0;
        font-family: 'Tenor Sans', sans-serif;
    }

   
    .profile-card {
    background: rgba(255, 255, 255, 0.9) !important;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 10px; 
    padding: 25px 40px 25px 25px; 
    
    width: 100%;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.4); 
    color: #2D5A43; 
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif !important;
}


    .profile-img-box {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    .profile-img-box img {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #2D5A43;
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

<div class="profile-page-bg">
    <div class="profile-inner-container">
        <nav class="breadcrumb-nav">
            <a href="{{ route('staff.dashboard') }}">Home</a>
            <span> > </span>
            <span style="color: white; font-weight: bold;">My Profile</span>
        </nav>

        <h1 class="staff-profile-title">My Profile</h1>

        <div class="profile-card">
            <h2 style="font-size: 1.4rem; font-weight: bold; margin-bottom: 10px;">{{ strtoupper($user->name) }}</h2>
            
            <div class="profile-img-box">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="User Photo">
                @else
                    <img src="{{ asset('images/profile-pic.png') }}" alt="User Icon">
                @endif
            </div>

            <div style="font-weight: 700; font-size: 0.9rem; margin-bottom: 20px;">ACTIVE (STAFF)</div>

            <div class="info-footer">
                <p><strong>STAFF ID: {{ $user->matric_number }} | ACTIVE</strong></p>
                <p>EMAIL: {{ strtoupper($user->email) }}</p>
                <p>POSITION: {{ strtoupper($user->role) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection