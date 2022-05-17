<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use Illuminate\Http\Request;

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

/**
 * TOASTS
 * toastr()->success('Success Message');
 * toastr()->error('Error Message');
 * toastr()->info('Info Message');
 * toastr()->warning('Warning Message');
 */



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



Route::get('/contact', function () {
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
return view('contact',['generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


Route::get('/help', function () {
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
return view('help',['generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

Route::get('/games_all', function () {
    $juegos = DB::table('games')->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('games_all',['juegos'=>$juegos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


Route::get('/projects_all', function () {
    $proyectos = DB::table('projects')->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('projects_all',['proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
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

Route::post('/game/{id}', 'App\Http\Controllers\GameCommentaryController@store');
Route::delete('game/{id}', 'App\Http\Controllers\GameCommentaryController@destroy');
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
    $comentarios = DB::table('game_commentaries')
            ->join('users', 'users.id', '=', 'game_commentaries.id_user')
            ->select('game_commentaries.*', 'users.name', 'users.avatar')
            ->where('game_commentaries.id_game', '=', $id)
            ->orderBy('game_commentaries.id', 'asc')
            ->get();
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

Route::post('/project/{id}', 'App\Http\Controllers\ProjectCommentaryController@store');
Route::delete('project/{id}', 'App\Http\Controllers\ProjectCommentaryController@destroy');
Route::get('/project/{id}', function ($id) {
    $proyecto = DB::table('projects')->where('id', '=', $id)->get();
    $comentarios = DB::table('project_commentaries')
            ->join('users', 'users.id', '=', 'project_commentaries.id_user')
            ->select('project_commentaries.*', 'users.name', 'users.avatar')
            ->where('project_commentaries.id_project', '=', $id)
            ->orderBy('project_commentaries.id', 'asc')
            ->get();
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
})->middleware('auth');



Route::get('/plans', function () {
    $user = Auth::user();
    $id = Auth::user()->id;
    $suscripcion = DB::table('roles')
                ->selectRaw('roles.id as id,roles.name as name, roles.description as description')
                ->join('role_user','role_user.role_id','=', 'roles.id')
                ->where('role_user.user_id','=',$id)
                ->get();
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
    return view('plans',['userPlans'=>$userPlans,'suscripcion'=>$suscripcion,'creatorPlans'=>$creatorPlans,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
})->middleware('auth');


Route::get('/plans/update', function (Request $request) {
    $tipoPlan = $request->input('plan');
    $tipoPlanUsuario = $request->input('plans-user');
    $tipoPlanCreador = $request->input('plans-creator');
    $Role_User = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->get();
    $rol_name = DB::table('roles')->select('name')->where('id', '=', 2)->get();
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return view('plansPay',['Role_User'=>$Role_User,'tipoPlan'=>$tipoPlan,'tipoPlanUsuario'=>$tipoPlanUsuario,'tipoPlanCreador'=>$tipoPlanCreador, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


Route::resource("games", "App\Http\Controllers\GamesController")->parameters(["games"=>"game"])->middleware('auth');
Route::resource("projects", "App\Http\Controllers\ProjectsController")->parameters(["projects"=>"project"])->middleware('auth');

Route::resource("profile_edit", "App\Http\Controllers\ProfileController")->middleware('auth');
Route::post('/store_profile', 'App\Http\Controllers\ProfileController@show');

Route::post('/update_plan/{id}', 'App\Http\Controllers\Role_UserController@update');

Route::post('user', 'App\Http\Controllers\LibraryController@store');

Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::post('/user/update', ['as' => 'user.update', 'uses' => 'App\Http\Controllers\UserController@update']);
