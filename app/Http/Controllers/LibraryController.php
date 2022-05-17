<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $nuevoJuego = new Library($request->input());
        $nuevoJuego->saveOrFail();
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
