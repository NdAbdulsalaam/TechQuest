<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
      public function index() {
        return view('admin.dashboard');
      }

      public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
      }
}
