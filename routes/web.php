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