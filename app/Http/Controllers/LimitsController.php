<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\limit;
use App\User;


class LimitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $limits = limit::all();
        return view('limits.index')->with('limits', $limits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                //To show the required create page when its clicked
                return view('limits.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate goods_received forms
        $this->validate($request, [
            'limits_id' => 'required',
            'user_id' => 'required',
            'market_cost' => 'required',
            'travelling_cost' => 'required',
            'fuel_cost' => 'required',
            'postage_cost' => 'required',
            'fax_cost' => 'required',

            ]);


        //creation
        return limit::create([
            'limits_id' => $data['limits_id'],
            'user_id' => $data['user_id'],
            'market_cost' => bcrypt($data['market_cost']),
            'travelling_cost' => $data['travelling_cost'],
            'fuel_cost' => $data['fuel_cost'],
            'postage_cost' => $data['postage_cost'],
            'fax_cost' => $data['fax_cost'],


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
        //
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
    }
}
