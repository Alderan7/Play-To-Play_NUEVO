<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    $noticias = DB::table('news')->get();
    $juegos = DB::table('games')->orderBy('id', 'desc')->limit(6)->get();
    $proyectos = DB::table('projects')->orderBy('id', 'desc')->limit(6)->get();
    //SELECT COUNT(games.id), genres.name FROM `games` INNER JOIN `genres` WHERE games.genre=genres.id GROUP BY `genre`;
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    //SELECT COUNT(projects.id), genres.name FROM `projects` INNER JOIN `genres` WHERE projects.genre=genres.id GROUP BY `genre`;
                $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('index',['noticias'=>$noticias, 'juegos'=>$juegos, 'proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


Route::get('/contacto', function () {
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
return view('contacto',['generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


Route::get('/ayuda', function () {
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
return view('ayuda',['generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

Route::get('/games', function () {
    $juegos = DB::table('games')->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('games',['juegos'=>$juegos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


Route::get('/projects', function () {
    $proyectos = DB::table('projects')->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('projects',['proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

Route::get('/genre_games/{genre}', function ($genre) {
    $juegos = DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('games.*, genres.name as genre')
                ->where('genres.name', '=', $genre)->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();   
    return view('genre_games',['juegos'=>$juegos, 'genreGame' => $genre, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

Route::get('/genre_projects/{genre}', function ($genre) {
    $proyectos = DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('projects.*, genres.name as genre')
                ->where('genres.name', '=', $genre)->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();  
    return view('genre_projects',['proyectos'=>$proyectos, 'genreGame' => $genre, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


Route::get('/game/{id}', function ($id) {
    $pertenece=False;
    if(Auth::user()){
        $user = DB::table('games')
        ->join('library', 'library.id_game', '=','games.id')
        ->where('library.id_player','=', Auth::user()->id)
        ->where('library.id_game','=', $id)
        ->get();
        if($user->isEmpty()){
            $pertenece=False;
        }else{
            $pertenece=True;
        }
    }
    $juego = DB::table('games')->where('id', '=', $id)->get();
    $comentarios = DB::table('game_commentaries')->where('id_game', '=', $id)->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('game',['pertenece'=>$pertenece,'juego'=>$juego, 'comentarios'=>$comentarios, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

Route::get('/project/{id}', function ($id) {
    $proyecto = DB::table('projects')->where('id', '=', $id)->get();
    $comentarios = DB::table('project_commentaries')->where('id_project', '=', $id)->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('project',['proyecto'=>$proyecto, 'comentarios'=>$comentarios, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

Route::get('/user', function () {
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
})->middleware('auth');

Route::get('/plans', function () {
    $userPlans = DB::table('plans')->where('type', '=', 1)->get();
    $creatorPlans = DB::table('plans')->where('type', '=', 2)->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('plans',['userPlans'=>$userPlans,'creatorPlans'=>$creatorPlans,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});