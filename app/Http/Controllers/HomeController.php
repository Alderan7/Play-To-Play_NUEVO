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
        $id = Auth::user()->id;
        $suscripcion = DB::table('roles')
                ->selectRaw('roles.id ,roles.name , roles.description')
                ->join('role_user','role_user.role_id','=', 'roles.id')
                ->where('role_user.user_id','=',$id)
                ->get();
        $juegos = DB::table('games')
                ->join('library', 'library.id_game', '=','games.id')
                ->where('library.id_player','=', $id)
                ->get();
        $proyectos = DB::table('projects')
                ->join('portfolio', 'portfolio.id_project', '=','projects.id')
                ->where('portfolio.id_creator','=', $id)
                ->get();
        $generos_juegos =  DB::table('games')
                    ->join('genres', 'games.genre', '=', 'genres.id')
                    ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                    ->groupBy('genres.name')->get();
        $generos_proyectos =  DB::table('projects')
                    ->join('genres', 'projects.genre', '=', 'genres.id')
                    ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                    ->groupBy('genres.name')->get();
        return view('user',['suscripcion'=>$suscripcion,'usuario'=>$user,'juegos'=>$juegos,'proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
    }
}
