<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alimento;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $tipo=Auth::user()->role_id;
    if($tipo==1){
        return view('menuAdmin');
    }else{
        return view('menu');
    }
    }
}
