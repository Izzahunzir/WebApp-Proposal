<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Get data and include 'role' from the hidden input
        $credentials = $request->validate([
            'matric_number' => 'required',
            'password' => 'required',
            'role' => 'required' // This comes from your hidden input
        ]);


        // 2. Try to log the user in using ID, Password, AND Role
        // This ensures a Student can't log in through the Staff toggle
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           
            $user = Auth::user();


            // 3. Redirect based on their role
            if ($user->role === 'staff') {
                return redirect()->intended('/staff/dashboard');
            }


            return redirect()->intended('/student/home');
        }


        // 4. If it fails, return with specific error message
        return back()->withErrors([
            'matric_number' => 'The provided ' . $request->role . ' credentials do not match our records.',
        ])->withInput($request->only('matric_number', 'role'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


    // 5. Staff Dashboard
    public function staffDashboard(Request $request)
{




    $query = Booking::query();


   
        if ($request->has('search') && $request->search != '') {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('user_name', 'LIKE', "%{$search}%")
                  ->orWhere('matric_number', 'LIKE', "%{$search}%");
            });
        }


        $bookings = $query->orderBy('booking_date', 'desc')->get();
       


        return response()
        ->view('staff.staff_dashboard', compact('bookings'))
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }
public function profile()
{
    return view('profile', ['user' => auth()->user()]);
}
public function destroyBooking($id)
{
    // Find the booking or show a 404 error if not found
    $booking = \App\Models\Booking::findOrFail($id);
   
    // Delete from database
    $booking->delete();




    return back()->with('success', 'Booking deleted successfully!');
}
}
