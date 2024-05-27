<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //   public function index() {
    //     return view('admin.dashboard');
    //   }

      public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
      }

      public function countSignedInOut()
      {
          $staff = User::withCount([
              'attendances as signed_in_count' => function ($query) {
                  $query->where('status', 'signed_in');
              },
              'attendances as signed_out_count' => function ($query) {
                  $query->where('status', 'signed_out');
              }
          ])->get();
  
          return view('staff.count_signed_in_out', compact('staff'));
      }


      public function signedInStaff()
    {
         // Get current date
         $today = Carbon::today();
        // Fetch signed-in staff (checked in but not checked out)
        $signedInStaff = User::with(['attendances' => function ($query) use ($today) {
            $query->whereNotNull('check_in_time')
                  ->whereNull('check_out_time')
                  ->whereDate('check_in_time', $today);
        }])->whereHas('attendances', function ($query) use ($today) {
            $query->whereNotNull('check_in_time')
                  ->whereNull('check_out_time')
                  ->whereDate('check_in_time', $today);
        })->get();

        return view('admin.signed-in', compact('signedInStaff'));
    }

    public function signedOutStaff()
    {
        // Get current date
        $today = Carbon::today();

        // Fetch signed-out staff for the current day (checked in and checked out today)
        $signedOutStaff = User::with(['attendances' => function ($query) use ($today) {
            $query->whereNotNull('check_in_time')
                  ->whereNotNull('check_out_time')
                  ->whereDate('check_in_time', $today);
        }])->whereHas('attendances', function ($query) use ($today) {
            $query->whereNotNull('check_in_time')
                  ->whereNotNull('check_out_time')
                  ->whereDate('check_in_time', $today)
                  ->latest();
        })->get();

        return view('admin.signed-out', compact('signedOutStaff'));
    }

    public function signedInOutStaff()
    {
        // Call the methods for signed-in and signed-out staff
        $signedInStaff = $this->signedInStaff()->getData()['signedInStaff'];
        $signedOutStaff = $this->signedOutStaff()->getData()['signedOutStaff'];

        return view('admin.signed-in-out', compact('signedInStaff', 'signedOutStaff'));
    }

    public function admin() {
        $sign_ins = $this->signedInStaff()->getData()['signedInStaff'];
        $sign_outs = $this->signedOutStaff()->getData()['signedOutStaff'];
        $salary = User::pluck('salary');

        return view('admin.dashboard', ['salary' => $salary], compact('sign_ins', 'sign_outs'));
      }
}
