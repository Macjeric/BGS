<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
//use Auth;
use Hash;
use App\User;
use Illuminate\Support\Facades\Input;
use App\admin;
//use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{

	    public function __construct()
    {
        $this->middleware('auth');
    }
   
      

    public function index()
    {
        //
        $admins = admin::all();
        return view('admin.index')->with('admins', $admins);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //To show the required create page when its clicked
        return view('admin.create');
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Validate goods_received forms
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'branch_id_' => 'required',
            'password' => 'required',
            ]);


        //creation
        return admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'title' => $data['title'],
            'branch_id_' => $data['branch_id_'],

            ]);

         return redirect('/admin')->with('success', 'User have been Registered');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = admin::find($id);
        return view('admin.edit')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //public function update(Request $request, $id)
        {
        //Validate goods_received forms
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'branch_id_' => 'required',
            'password' => 'required',
            ]);

            // creation
            $admin = admin::find($id);
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = $request->input('password');
            $admin->title = $request->input('title');
            $admin->branch_id_ = $request->input('branch_id_');


            $admin->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('/admin')->with('success', 'User Removed');
    }
}

