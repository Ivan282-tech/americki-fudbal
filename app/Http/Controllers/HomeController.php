<?php

namespace App\Http\Controllers;

use App\Models\Novosti;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $novosti = Novosti::all();
        return view('index', ['novosti' => $novosti]);
        
    }
}
