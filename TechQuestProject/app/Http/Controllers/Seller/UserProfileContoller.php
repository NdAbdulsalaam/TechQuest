<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserProfileContoller extends Controller
{
    public function view($id){
        $user = User::find($id);
        return view('seller.view-user', compact('user'));
      }

      
    public function create(){
      return view('seller.add-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    
        $add = new User();
        $add->name = $request->input('fname') . ' ' . $request->input('lname');
        $add->username = $request->input('username');
        $add->role = $request->input('role');
        $add->email = strtolower($request->input('email'));
        $add->password = Hash::make($request->input('lname'));
        $add->save();
    
        return redirect()->back()->with('success', 'User added successfully! Default password is Your Last Name.');
    }

      public function edit($id){
        $user = User::find($id);
        return view('seller.update-user', compact('user'));
      }

      public function update($id, Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $update = User::findOrFail($id);

        $update->name = $request->input('name');
        $update->username = $request->input('username');
        $update->role = $request->input('role');
        // $update->password = $request->input('password');
        // $update->email = $request->input('email');

        $update->update($request->all());

        return redirect()->back()->with('success', 'User profile updated successfully!');
      }

      public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
      

}

