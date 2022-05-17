<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        $userPlans = DB::table('Planes')->where('Usuario', '=', 1)->get();
        $creatorPlans = DB::table('Planes')->where('Usuario', '=', 2)->get();
        return view('plans',['userPlans'=>$userPlans,'creatorPlans'=>$creatorPlans, 'generos'=>$generos, 'proyectosGenero'=>$proyectosGenero]);
    }

    public function update(Request $request) {
        console.log("actualizado");
        //$request->only('name','email');
        return back();
    }

}
