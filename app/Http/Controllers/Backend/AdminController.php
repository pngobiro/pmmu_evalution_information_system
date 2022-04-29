<?php
namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;




class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     * @return void
     * 
     * 
     * */
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     * **/
    public function index()
    {
        return view('backend.index');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     * **/
    public function dashboard()
    {
        return view('backend.dashboard');
    }


    // list all users   and their roles
    public function users()
    {
        return view('backend.users');
    }

    
    // list all users   and their roles
    public function roles()
    {
        return view('backend.roles');
    }

    // list all users   and their roles
    public function permissions()
    {
        return view('backend.permissions');
    }

    // list all users   and their roles
    public function settings()
    {
        return view('backend.settings');
    }

    // list all users   and their roles



    // 

    



}













