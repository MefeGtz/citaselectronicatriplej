<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

     //   $hoy= Carbon:: today('America/Tegucigalpa');
       //$clientes= cliente::all()->Count();
       $cantclientes=DB::table('clientes')->Count();
       
        return view('home',compact('cantclientes'));

    }

}
