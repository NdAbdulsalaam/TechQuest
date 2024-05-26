<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserProfileContoller extends Controller
{
    public function view($id){
        $user = User::find($id);
        return view('admin.view-user', compact('user'));
      }

      
    public function create(){
      return view('admin.add-user');
    }

    public function store(Request $request)
    {
      $request->validate([
        'fname' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['nullable', 'string', 'max:255'],
        'position' => ['nullable', 'string', 'max:255'],
        'office' => ['nullable', 'string', 'max:255'],
        'age' => ['nullable', 'string', 'max:255'],
        'salary' => ['nullable', 'numeric'],
        'role' => ['required', 'string', 'max:255'],
    ]);
    
        $addUser = new User();

        $addUser->fname = $request->input('fname');
        $addUser->lname = $request->input('lname');
        $addUser->username = $request->input('username');
        $addUser->email = $request->input('email');
        $addUser->phone = $request->input('phone');
        $addUser->position = $request->input('position');
        $addUser->office = $request->input('office');
        $addUser->age = $request->input('age');
        $addUser->salary = $request->input('salary');
        $addUser->role = $request->input('role');
        $addUser->password = Hash::make($request->input('lname'));

        $addUser->save();
    
        return redirect()->back()->with('success', 'Staff added successfully! Default password is the last name.');
    }

      public function edit($id){
        $user = User::find($id);
        return view('admin.update-user', compact('user'));
      }

      public function update($id, Request $request){

        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'office' => ['nullable', 'string', 'max:255'],
            'age' => ['nullable', 'string', 'max:255'],
            'salary' => ['nullable', 'numeric'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    
        $updateUser = User::findOrFail($id);
    
        $updateUser->fname = $request->input('fname');
        $updateUser->lname = $request->input('lname');
        $updateUser->username = $request->input('username');
        $updateUser->email = $request->input('email');
        $updateUser->phone = $request->input('phone');
        $updateUser->position = $request->input('position');
        $updateUser->office = $request->input('office');
        $updateUser->age = $request->input('age');
        $updateUser->salary = $request->input('salary');
        $updateUser->role = $request->input('role');
    
        $updateUser->save();
    
        return redirect()->back()->with('success', 'Staff profile updated successfully!');
    }
    

      public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
      

}

