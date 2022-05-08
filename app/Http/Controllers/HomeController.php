<?php

namespace App\Http\Controllers;

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
        $generos = DB::table('Juegos')
             ->select(DB::raw('count(*) as count, Genero'))
             ->groupBy('Genero')
             ->get();
        $proyectosGenero = DB::table('Proyectos')
             ->select(DB::raw('count(*) as count, Genero'))
             ->groupBy('Genero')
             ->get();  
        return view('home',['generos'=>$generos, 'proyectosGenero'=>$proyectosGenero]);
    }
}
