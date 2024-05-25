<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $today = Carbon::today()->toDateString();

        $attendance = Attendance::firstOrCreate(
            ['user_id' => $user->id, 'date' => $today],
            ['check_in_time' => Carbon::now()->format('H:i:s')]
        );

        if (!$attendance->wasRecentlyCreated) {
            return redirect()->back()->with('message', 'Already signed in today.');
        }

        return view('auth.sign-in');
    }

    public function signOut(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $today = Carbon::today()->toDateString();

        $attendance = Attendance::where('user_id', $user->id)->where('date', $today)->first();

        if (!$attendance) {
            return redirect()->back()->with('message', 'No sign-in record found for today.');
        }

        if ($attendance->check_out_time) {
            return redirect()->back()->with('message', 'Already signed out today');
        }

        $attendance->update(['check_out_time' => Carbon::now()->format('H:i:s')]);

        return view('auth.sign-out');
    }
}
