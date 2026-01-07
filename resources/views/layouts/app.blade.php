<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIUM Female Sports Complex</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script> </head>
<body>


    <header class="top-header">
        <div class="header-branding">
            <div class="menu-toggle" onclick="toggleSidebar()">&#9776;</div>
            <img src="{{ asset('images/fsc-logo.png') }}" class="mini-logo">
            <div class="header-text">
                <span class="header-main">IIUM FEMALE</span>
                <span class="header-sub">SPORT COMPLEX</span>
            </div>
        </div>


        <div class="user-profile" style="display: flex; align-items: center;">
            <a href="{{ route('student.profile') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                @auth
                    <span>{{ strtoupper(Auth::user()->name) }}</span>
                    @if(Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" class="user-avatar" style="width:30px; margin-left:10px;">
                    @else
                        <img src="{{ asset('images/profile-pic.png') }}" class="user-avatar" style="width:30px; margin-left:10px;">
                    @endif
                @endauth
            </a>


            @auth
            <a href="#" class="header-logout"
               onclick="if(confirm('Are you sure you want to logout?')) { event.preventDefault(); document.getElementById('logout-form').submit(); }">
                LOGOUT
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endauth
        </div>
    </header>


    @yield('content')


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