<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;
use Validator;
use Illuminate\Support\Facades\Request as Input;


class Sshserver extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
    }

    public function index()
    {
        return view('sshserver.index');
    }
    //change password   function
    public function changePasswordViaSSH(Request $request)
    {

        // validate the info, create rules for the inputs
        $rules = array(
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password',
            'user_name' => 'required|min:6',


        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        $user = $request->input('user_name');
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        if ($validator->fails()) {
            return redirect('/sshserver')
                ->withErrors($validator)
                ->withInput();
        } else {
            $ssh = new SSH2('196.201.229.211', 4443);
            // if connection is error then redirect back and show error message
            
            if (!$ssh->login('root', 'root')) {
                exit('Login Failed');
            }

    
        if (!$ssh->exec('echo "'.$new_password.'" | passwd --stdin '.$user)) {
            // redirect back to the form with the errors from the validator
            return redirect()->back()->withErrors($validator);
        
            exit('Failed to change password');
        }

        else
        {
            return redirect('goodbye')->with('success', 'Password Changed Successfully');
        }
    }
}

    


    public function goodbye()
    {
        
        return view('sshserver.goodbye');
    }
}
