<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
   
  public function change_password_form(Request $request, User $user){

  
  

    // Get the user from the database
 
    $user->default_password_set = 0;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('dashboard')->with('status', 'Password changed successfully.');



    return view('admin.users.change_password_form',compact('user'));


  }
  
  public function change_password(Request $request, User $user)
    {
        $request->validate([
          'password' => ['required', 'string', 'confirmed'],
      ]);

        $user->update([
          'password' => Hash::make($request->password)
      ]);

        return redirect()->route('dashboard')->with('message', 'User Password Updated Succesfully');
    }
}
