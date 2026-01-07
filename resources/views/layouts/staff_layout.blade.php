<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Panel - IIUM Female Sports Complex</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body style="background-color: #ffffff; overflow-y: auto;">

    <header class="top-header">
        <div class="header-branding">
            <div class="menu-toggle" onclick="toggleSidebar()">&#9776;</div>
            <img src="{{ asset('images/fsc-logo.png') }}" class="mini-logo">
            <div class="header-text">
                <span class="header-main">IIUM FEMALE</span>
                <span class="header-sub">SPORT COMPLEX</span>
            </div>
        </div>

        <div class="user-profile">
            <a href="{{ route('staff.profile') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                @auth
                    <span class="user-name">{{ strtoupper(Auth::user()->name) }}</span>
                    @if(Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" class="user-avatar">
                    @else
                        <img src="{{ asset('images/profile-pic.png') }}" class="user-avatar">
                    @endif
                @endauth
            </a>

            @auth
            <a href="#" class="header-logout" 
               onclick="if(confirm('Logout?')) { event.preventDefault(); document.getElementById('logout-form').submit(); }">
                LOGOUT
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endauth
        </div>
    </header>

    <div class="dashboard-wrapper">
        <aside class="sidebar">
            <nav class="nav-links">
                <div class="menu-label" style="padding-top:20px;">Staff Menu</div>
                <a href="{{ route('staff.dashboard') }}" class="{{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">Dashboard</a>
                <div class="divider"></div>
                <a href="{{ route('staff.profile') }}" class="{{ request()->routeIs('staff.profile') ? 'active' : '' }}">My Profile</a>
            </nav>
        </aside>

        <main class="main-content">
            <div class="content-body">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        }
    </script>
</body>
</html>