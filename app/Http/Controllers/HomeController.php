<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends BackendBaseController
{
    protected $route = 'adminHome';
    protected $panel = 'Dashboard';
//    protected $view = 'backend.users.';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
//        return view('adminHome');
        return view($this->__DataToView('adminHome'));
    }
}
