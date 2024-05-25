<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;


class DashboardController extends Controller
{
      public function index() {
        return view('admin.dashboard');
      }

      public function sellers(){
        $sellers = Seller::all();
        return view('admin.staffs', compact('sellers'));
      }
}


