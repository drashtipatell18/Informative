<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
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

   public function loginStore(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6|max:128',
        ]);

        // Rate limiting key
        $key = Str::transliterate(Str::lower($request->input('email')) . '|' . $request->ip());

        // Check if too many login attempts
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            throw ValidationException::withMessages([
                'email' => [
                    "Too many login attempts. Please try again in {$seconds} seconds."
                ],
            ]);
        }

        // Attempt authentication using Laravel's built-in attempt method
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember'); // if you have a remember me checkbox

        if (Auth::attempt($credentials, $remember)) {
            // Clear rate limiter on successful login
            RateLimiter::clear($key);

            // Regenerate session for security
            $request->session()->regenerate();

            // Update last login timestamp (optional)
            $user = Auth::user();
            $user->update([
                'last_login_at' => Carbon::now(),
                'last_login_ip' => $request->ip()
            ]);

            // Return JSON response for AJAX requests
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect' => route('dashboard')
                ]);
            }

            // Redirect with success message
            return redirect()
                ->intended(route('dashboard'))
                ->with('success', 'Welcome back, ' . $user->name . '!');
        }

        // Record failed attempt
        RateLimiter::hit($key, 60); // Lock for 60 seconds after 5 attempts

        // Check if user exists to provide specific error messages
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $errorMessage = 'No account found with this email address.';
            $errorField = 'email';
        } else {
            $errorMessage = 'The password you entered is incorrect.';
            $errorField = 'password';
        }

        // Return JSON response for AJAX requests
        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => $errorMessage,
                'errors' => [
                    $errorField => [$errorMessage]
                ]
            ], 422);
        }

        // Return with errors
        return back()
            ->withErrors([$errorField => $errorMessage])
            ->onlyInput('email');
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
