<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $id=Auth::user()->id;
        $juegos = DB::table('games')
                ->join('library', 'library.id_game', '=','games.id')
                ->where('library.id_player','=', $id)
                ->get();
        $generos_juegos =  DB::table('games')
                    ->join('genres', 'games.genre', '=', 'genres.id')
                    ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                    ->groupBy('genres.name')->get();
        $generos_proyectos =  DB::table('projects')
                    ->join('genres', 'projects.genre', '=', 'genres.id')
                    ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                    ->groupBy('genres.name')->get();
        return view('user',['usuario'=>$user,'juegos'=>$juegos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
    }
}
