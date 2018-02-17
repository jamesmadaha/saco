<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Savings;
use App\User;
use Auth;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('member.show');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        
        return view('savings.savings');
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
/*
        $this->validate(request(),[

         'firstname'=>'required',
         'middlename'=>'required',
         'lastname'=>'required',
         'email'=>'required',
         'phone'=>'required',
         'bankname'=>'required',
         'accountnumber'=>'required',
         'nextkinname'=>'required',
         'nextkinrelashiship'=>'required',


        ]);
*/

         Savings::create([

          'saving_date'=>request('savingdate'),
          'member_id'=>request('memberid'),
          'amount'=>request('amount'),  
          'saving_code'=>request('savingcode'),
          'user_id'=>Auth::user()->id
         ]);

            $savings=Savings::all();

          

            return view('savings.show',compact('savings'));



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