<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['Login', 'LoginStore', 'logout']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Login(){
        return view('auth.login');
    }

     public function LoginStore(Request $request)
     {
        // First check if user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'No account found with this email address',
            ])->onlyInput('email');
        }

        // Then check password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The password you entered is incorrect',
            ])->onlyInput('email');
        }

        // If we get here, credentials are valid
        $auth = Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('dashboard')->with('success', 'Login successful!')->with('auth', $auth);
    }

    /**
     * Alternative method using manual verification (your original approach)
     */
    public function loginStoreManual(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6|max:128',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$user) {
            return back()->withErrors([
                'email' => 'No account found with this email address',
            ])->onlyInput('email');
        }

        // Check if account is active (optional)
        if (!$user->is_active) {
            return back()->withErrors([
                'email' => 'Your account has been deactivated. Please contact support.',
            ])->onlyInput('email');
        }

        // Verify password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The password you entered is incorrect',
            ])->onlyInput('email');
        }

        // Check if email is verified (optional)
        if (!$user->hasVerifiedEmail()) {
            return back()->withErrors([
                'email' => 'Please verify your email address before logging in.',
            ])->onlyInput('email');
        }

        // Login the user
        Auth::login($user, $request->boolean('remember'));

        // Regenerate session
        $request->session()->regenerate();

        // Update last login (optional)
        $user->update([
            'last_login_at' => Carbon::now(),
            'last_login_ip' => $request->ip()
        ]);

        return redirect()
            ->intended(route('dashboard'))
            ->with('success', 'Login successful!');
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}
