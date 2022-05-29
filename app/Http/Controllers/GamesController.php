<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\Response;


class GamesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos_juegos =  DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
            ->groupBy('genres.name')->get();
        $generos_proyectos =  DB::table('projects')
            ->join('genres', 'projects.genre', '=', 'genres.id')
            ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
            ->groupBy('genres.name')->get();            
        return view("games_index", ["games"=>Game::paginate(4),'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = DB::table('genres')->get();
        $generos_juegos =  DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
            ->groupBy('genres.name')->get();
        $generos_proyectos =  DB::table('projects')
            ->join('genres', 'projects.genre', '=', 'genres.id')
            ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
            ->groupBy('genres.name')->get();            
        return view("games_create", ['generos'=>$generos,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if($request->hasFile('cover')) {
            
            //get filename with extension
            $filenamewithextension = $request->file('cover')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('cover')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
    
            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore, fopen($request->file('cover'), 'r+'));
    
            //Store $filenametostore in the database
        }


        if($request->hasFile('archives')) {
            
            //get filename with extension
            $filenamewithextension = $request->file('archives')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('archives')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore2 = $filename.'_'.uniqid().'.'.$extension;
    
            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore2, fopen($request->file('archives'), 'r+'));
            //Store $filenametostore in the database
        }

        

        $juego = new Game($request->input());     
        $juego['cover']=$filenametostore;
        $juego['archives']=$filenametostore2;
        $juego->saveOrFail();
        toastr()->success('Juego creado Correctamente');
        return redirect()->route("games.index")->with(["mensaje" => "Juego creado",
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $juego
     * @return \Illuminate\Http\Response
     */
    public function show(Game $juego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $juego
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $generos = DB::table('genres')->get();
        $generos_juegos =  DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
            ->groupBy('genres.name')->get();
        $generos_proyectos =  DB::table('projects')
            ->join('genres', 'projects.genre', '=', 'genres.id')
            ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
            ->groupBy('genres.name')->get();
        return view("games_edit", ['game'=>$game,'generos'=>$generos,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $juego
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Game $game)
    {

        if($request->hasFile('cover-game') || $request->hasFile('archives')) {

            if($request->hasFile('cover-game')) {
            //get filename with extension
            $filenamewithextension = $request->file('cover-game')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('cover-game')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;

            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore, fopen($request->file('cover-game'), 'r+'));

            //Store $filenametostore in the database
            }
            
            if($request->hasFile('archives')) {
            //get filename with extension
            $filenamewithextension = $request->file('archives')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('archives')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore2 = $filename.'_'.uniqid().'.'.$extension;
    
            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore2, fopen($request->file('archives'), 'r+'));
            //Store $filenametostore in the database

            }
            $variable=$request->input();
            $storage_url= config('global.storage');


            if($request->hasFile('cover-game')) {
                //$completeurlname=$storage_url.$filenametostore; 
                $variable['cover']=$filenametostore;
                }
                
            if($request->hasFile('archives')) {
                //$completeurlname2=$storage_url.$filenametostore2;             
                $variable['archives']=$filenametostore2;
            }          

            $game->fill($variable)->saveOrFail();
            toastr()->success('Juego editado Correctamente');
            return redirect()->route("games.index")->with(["mensaje" => "Juego actualizado"]);
        }else{
            $variable=$request->input();
            $game->fill($variable)->saveOrFail();
            toastr()->success('Juego editado Correctamente');
            return redirect()->route("games.index")->with(["mensaje" => "Juego actualizado"]);
        }
        
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $juego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        toastr()->error('Atención, juego eliminado');
        return redirect()->route("games.index")->with(["mensaje" => "Juego eliminado",]);
    }

    public function download($archives){

        //$storage_url= config('global.storage');
        //$path = $storage_url.$archives;
        return redirect()->route($archives);
    }
}
