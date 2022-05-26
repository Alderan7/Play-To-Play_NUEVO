<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = Auth::user();
        $id = Auth::user()->id;
        $request->user()->authorizeRoles(['administrator','creator', 'creator-mid','creator-all' ]);
        $projects_creator = Project::select('projects.*')
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
        return view("projects_index", ["projects"=>Project::paginate(4),"projects_creator"=>$projects_creator,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['administrator','creator', 'creator-mid','creator-all' ]);
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
        if($request->hasFile('cover') && $request->hasFile('image')) {
            
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
    
            //get filename with extension
            $filenamewithextension2 = $request->file('image')->getClientOriginalName();
                
            //get filename without extension
            $filename2 = pathinfo($filenamewithextension2, PATHINFO_FILENAME);

            //get file extension
            $extension2 = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore2 = $filename2.'_'.uniqid().'.'.$extension2;

            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore2, fopen($request->file('image'), 'r+'));


            //Store $filenametostore in the database
            $proyecto = new Project($request->input());
            $storage_url= config('global.storage');
            $completeurlname=$storage_url.$filenametostore; 
            $completeurlname2=$storage_url.$filenametostore2; 
            $proyecto['image']=$completeurlname2;
            $proyecto['cover']=$completeurlname;
            $proyecto->saveOrFail();

            $user = Auth::user();
            $id = Auth::user()->id;

            $project = DB::table('projects')
                ->latest('id')
                ->first();
            $nuevoProyecto = new Portfolio();
            $nuevoProyecto->fill([
                'id_project' => $project->id,
                'id_creator' => $id]
            );           
            $nuevoProyecto->saveOrFail();
            return redirect()->route("projects.index")->with(["mensaje" => "proyecto creado",
        ]);
        }

        
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
    public function edit(project $project, Request $request)
    {
        $request->user()->authorizeRoles(['administrator','creator', 'creator-mid','creator-all' ]);
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

        if($request->hasFile('cover-game') || $request->hasFile('image-game')) {

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
            
            if($request->hasFile('image-game')) {
            //get filename with extension
            $filenamewithextension = $request->file('image-game')->getClientOriginalName();
    
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    
            //get file extension
            $extension = $request->file('image-game')->getClientOriginalExtension();
    
            //filename to store
            $filenametostore2 = $filename.'_'.uniqid().'.'.$extension;
    
            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore2, fopen($request->file('image-game'), 'r+'));
            //Store $filenametostore in the database

            }
            $variable=$request->input();
            $storage_url= config('global.storage');


            if($request->hasFile('cover-game')) {
                $completeurlname=$storage_url.$filenametostore; 
                $variable['cover']=$completeurlname;
                }
                
            if($request->hasFile('image-game')) {
                $completeurlname2=$storage_url.$filenametostore2;             
                $variable['image-game']=$completeurlname2;
            }          

            $project->fill($variable)->saveOrFail();
            toastr()->success('Proyecto editado Correctamente');
            return redirect()->route("projects.index")->with(["mensaje" => "proyecto actualizado"]);
        }else{
            $variable=$request->input();
            $project->fill($variable)->saveOrFail();
            toastr()->success('Proyecto editado Correctamente');
            return redirect()->route("projects.index")->with(["mensaje" => "proyecto actualizado"]);
        }

        /*$storage_url= config('global.storage');
        $variable=$request->input();
        $variable['Banner']=$storage_url.$variable['Banner'];
        $proyect->fill($variable)->saveOrFail();
        return redirect()->route("projects.index")->with(["mensaje" => "proyecto actualizado"]);*/
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
