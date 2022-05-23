<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\BackendBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Userontroller extends BackendBaseController
{
    protected $route = 'backend.users.';
    protected $panel = 'Users';
//    protected $view = 'backend.users.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = User::all();
        return view($this->__DataToView($this->route . 'index'),compact('data'));
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
    public function changeUserStatus(Request $request){
        $user = User::find($request->id);
        $user->is_admin = $request->is_admin;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
