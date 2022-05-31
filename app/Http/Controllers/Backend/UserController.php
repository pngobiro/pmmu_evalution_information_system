<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function index(Request $request)
    {
        $users = User::all();

        if ($request->has('search')) {

            $users = User::where('first_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('phone_number', 'LIKE', '%' . $request->search . '%')
                ->orWhere('pj_number', 'LIKE', '%' . $request->search . '%')
                ->paginate(100);
            }
    
            return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pj_number' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'designation' => 'required|string|max:255',
            'phone_number' => 'required|string|max:10',
        ]);

        User::create([
            'pj_number'                     => $request->pj_number,
            'first_name'                    => $request->first_name,
            'last_name'                     => $request->last_name,
            'email'                         => $request->email,
            'phone_number'                  => $request->phone_number,
            'designation'                   => $request->designation,
            'default_password_set'          => 1, 
            'password'                      => Hash::make($request->pj_number),
        ]);

        return redirect()->route('users.index')->with('message', 'User Register Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)

    {

        $user->update([
            'pj_number'                     => $request->pj_number,
            'first_name'                    => $request->first_name,
            'last_name'                     => $request->last_name,
            'email'                         => $request->email,
            'designation'                   => $request->designation,

        ]);



        return redirect()->route('users.index')->with('message', 'User Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // soft delete user

        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index')->with('message', 'You are deleting yourself.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('message', 'User Deleted Succesfully');
    }

    public function profile()
    {
        return view('admin.users.profile');
    }


    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'pj_number' => $request->pj_number,
            'designation' => $request->designation,

        ]);

        return redirect()->route('users.profile')->with('message', 'Profile Updated Succesfully');
    }


    public function permissions_form(User $user){

        $roles = Role::all();
        return view('admin.users.permissions_form', compact('user','roles'));

    }

    // function to update User  Permissions using ajax 

    public function update_permissions(Request $request, User $user){

        $user->roles()->sync($request->roles);
        return response()->json(['success'=>'Permissions Updated Successfully']);

    }

    // deactivate user function
    public function deactivate(User $user){

        $user->update([
            'is_active' => 0,
        ]);

        return redirect()->route('users.index')->with('message', 'User Deactivated Succesfully');
    }

    // activate user function
    public function activate(User $user){

        $user->update([
            'is_active' => 1,
        ]);

        return redirect()->route('users.index')->with('message', 'User Activated Succesfully');
    }

    public function reset_password(User $user){

        $user->update([
            'password' => Hash::make($user->pj_number),
        ]);

        return redirect()->route('users.index')->with('message', 'User Password Reset Succesfully');
    }

}