<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show($id){
        $user = User::find($id);
        return view('user.view-profile', compact('user'));
      }

    public function edit($id){
        $user = User::find($id);
        return view('user.edit-profile', compact('user'));
      }

    /**
     * Update the user's profile information.
     */

     public function update($id, Request $request){

        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'age' => ['nullable', 'string', 'max:255'],
        ]);
    
        $updateUser = User::findOrFail($id);
    
        $updateUser->fname = $request->input('fname');
        $updateUser->lname = $request->input('lname');
        $updateUser->username = $request->input('username');
        $updateUser->email = $request->input('email');
        $updateUser->phone = $request->input('phone');
        $updateUser->age = $request->input('age');
    
        $updateUser->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
