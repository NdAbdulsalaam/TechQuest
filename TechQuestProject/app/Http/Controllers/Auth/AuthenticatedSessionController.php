<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on user's role
        return redirect($this->redirectTo());
    }

    public function redirectTo() {
        $role = Auth::user()->role; 
            switch ($role) {
                case 'admin':
                    return '/admin/dashboard';
                case 'seller':
                    return '/seller/dashboard';
                case 'user':
                    return '/user/dashboard';
                default:
                    return '/home'; 
        }
      }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // public function redirectTo() {
    //     $role = Auth::user()->role; 
    //     switch ($role) {
    //       case 'admin':
    //         return '/admin_dashboard';
    //       case 'seller':
    //         return '/seller_dashboard';
      
    //       default:
    //         return '/home'; 
    //     }
    //   }
}
