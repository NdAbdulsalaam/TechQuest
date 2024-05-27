<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    // public function index($) {
    //     $user = User::find($id);
    //     return view('user.dashboard', compact('user'));
    //   }

      public function index() {
        return view('user.dashboard');
      }

}
