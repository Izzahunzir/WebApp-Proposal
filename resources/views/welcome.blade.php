@extends('layouts.app')

@section('content')
<div class="hero-container">

    <p class="welcome-label">WELCOME TO</p>
    <div class="title-group">
       
        <img src="{{ asset('images/fsc-logo.png') }}" class="center-icon" alt="Flower Logo">
       
        <div class="text-stack">
            <h1 class="main-title">IIUM FEMALE</h1>
            <h2 class="sub-title">SPORT COMPLEX INDOOR</h2>
        </div>

    </div>




    <h1 class="system-title">BOOKING SYSTEM</h1>

    <p class="quote-text">"Champion keeps playing until they get it right" - Billie Jean King</p>

    <a href="{{ route('login') }}" class="btn-get-started">Get started</a>

    <style>
    
    .top-header, .sidebar {
        display: none !important;
    }
    
    
    .main-content {
        margin-left: 0 !important;
        padding: 0 !important;
    }
</style>


</div>
@endsection
