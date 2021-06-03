<?php

namespace App\Http\Controllers;

use App\Models\Storage;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id =  auth()->id();
        $storage = Storage::where('user_id', '=', $id)
            ->first(); //Obtenemos un obj con el storage del usuario 
        $storage = number_format(15 - $storage->capacity, 6);
        $storage =  ($storage / 15.000) * 100; //Porcentaje descontado
        
        /* return 15 - $storage ;
        $total = 15 - $storage ; */
        
        return view('home', compact('storage'));
    }
}
