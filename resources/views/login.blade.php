@extends('layouts.app')

@section('content')
<div class="login-container">
    
    <div class="branding-section">
        <div class="title-group">
            <img src="{{ asset('images/fsc-logo.png') }}" class="center-icon" alt="Logo">
            <div class="text-stack">
                <h1 class="main-title">IIUM FEMALE</h1>
                <h2 class="sub-title">SPORT COMPLEX INDOOR</h2>
            </div>
        </div>
    </div>

    <div class="form-section">
        <div class="login-card">
            <img src="{{ asset('images/uia-logo.png') }}" class="card-logo">
            
            <div class="role-toggle">
                <button type="button" class="toggle-btn active" onclick="setRole('student')">Student</button>
                <button type="button" class="toggle-btn" onclick="setRole('staff')">Staff</button>
            </div>

            @if ($errors->any())
                <div style="color: red; margin-bottom: 10px;">{{ $errors->first() }}</div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf 
                
                <input type="hidden" name="role" id="role-input" value="student">

                <div class="input-group">
                    <label id="id-label">Student ID:</label>
                    <input type="text" name="matric_number" id="id-input" placeholder="3012344" required>
                </div>
                
                <div class="input-group">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="••••••••••" required>
                </div>
                
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>
</div>

<script>
function setRole(role) {
    const label = document.getElementById('id-label');
    const input = document.getElementById('id-input');
    const roleInput = document.getElementById('role-input'); 
    const buttons = document.querySelectorAll('.toggle-btn');

    //update the hidden value so the Controller knows the role
    roleInput.value = role;

    //update button visual state
    buttons.forEach(btn => btn.classList.remove('active'));
    
    //find the button that was clicked and make it blue/active
    const clickedButton = Array.from(buttons).find(btn => btn.innerText.toLowerCase() === role);
    if(clickedButton) clickedButton.classList.add('active');

    //change labels based on selection
    if (role === 'staff') {
        label.innerText = 'Staff ID:';
        input.placeholder = 'Staff Number (e.g. ST12345)';
    } else {
        label.innerText = 'Student ID:';
        input.placeholder = '3012344';
    }
}
</script>
@endsection

<style>
    /*hides the green header and the sidebar*/
    .top-header, .sidebar {
        display: none !important;
    }
</style>
    

  