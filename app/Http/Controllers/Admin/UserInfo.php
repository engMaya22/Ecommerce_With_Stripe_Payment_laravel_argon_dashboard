<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo as user_info;//we change the name of the model because it is the same of controller



class UserInfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);


$userInfo=user_info::where('user_id',$request->id)->first();//request id is sent from form hidden , user_id is fk in user model
// dd($request->all());

// i passed id as hidden from edit  user blade because store accept one paramete
if($userInfo)//if user has data in info
{

$userInfo->phone=$request->phone;
$userInfo->country=$request->country;
$userInfo->city=$request->city;
$userInfo->address=$request->address;
$userInfo->save();
return redirect()->back();

}
else{
    $new=new user_info();
    $new->phone=$request->phone;
    $new->country=$request->country;
    $new->city=$request->city;
    $new->address=$request->address;
    $new->user_id=$request->id;
    $new->save();
    return redirect()->back();
}
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
