<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
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
        return view("projects_index", ["projects"=>Project::paginate(4),'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
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
        return view("projects_create", ['generos'=>$generos,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
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

        $proyecto = new Project($request->input());
        $storage_url= config('global.storage');
        $completeurlname=$storage_url.$filenametostore;        
        $proyecto['cover']=$completeurlname;
        $proyecto->saveOrFail();
        return redirect()->route("projects.index")->with(["mensaje" => "proyecto creado",
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
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
        return view("projects_edit", ['project'=>$project, 'generos'=>$generos,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $storage_url= config('global.storage');
        $variable=$request->input();
        $variable['Banner']=$storage_url.$variable['Banner'];
        $proyect->fill($variable)->saveOrFail();
        return redirect()->route("projects.index")->with(["mensaje" => "proyecto actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route("projects.index")->with(["mensaje" => "proyecto eliminado",]);
    }
}
