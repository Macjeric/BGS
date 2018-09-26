<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
//use Auth;
use Hash;
use App\User;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{

	    public function __construct()
    {
        $this->middleware('auth');
    }
   
      

       public function add_user(Request $request)
    {


 	DB::table('users')->insert(
        array(
            'name' => Input::get('name'),
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'title' => Input::get('title'),
            'branch_id_' => Input::get('branch_name'),
            'status' => 'created',
            'password' => Hash::make($request['password']),
            'created_at'     =>   Carbon::now(),
            'updated_at'     =>  Carbon::now()
        ));
       
/*
         $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'title' => 'required|max:255',
            'branch_id' => 'required',
            'password' => 'required|min:6|confirmed',

         ]);

        $User = new User;

        $User->name = Input::get('name');
        $User->email = Input::get('email');
        $User->title = Input::get('title');
        $User->branch_id = Input::get('branch_name');
        $User->password = Hash::make($request['password']);

        $User->save();
 */
        //Log::info('Admin created a new user, user id: '.Auth::user()->id);
        
        return redirect('/')->with('success', 'User has been Registered Successfully!');

    }

  	public function create_user()
    {
    	$list_branches = DB::table('branches')->get();

    	return view('auth.register',compact('list_branches'));
    }

}
