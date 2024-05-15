<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {
        return view('admin.dashboard');
      }
      public function users(){
        $users = User::all();
        return view('/a', compact('users'));
      }
}

