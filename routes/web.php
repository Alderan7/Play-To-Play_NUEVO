<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mailable;
use App\Models\Project;

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
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('index',['noticias'=>$noticias, 'juegos'=>$juegos, 'proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

//Funciones necesarias para pasar los datos de los géneros de juegos y proyectos a todas las páginas de la web

function genre_games(){
    //SELECT COUNT(games.id), genres.name FROM `games` INNER JOIN `genres` WHERE games.genre=genres.id GROUP BY `genre`;
    $generos_juegos =  DB::table('games')
                ->join('genres', 'games.genre', '=', 'genres.id')
                ->selectRaw('count(games.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return $generos_juegos;            
    }
    
    function genre_projects(){
    //SELECT COUNT(projects.id), genres.name FROM `projects` INNER JOIN `genres` WHERE projects.genre=genres.id GROUP BY `genre`;
    $generos_proyectos =  DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('count(projects.id) as number_of_games, genres.name as name_of_genre')
                ->groupBy('genres.name')->get();
    return $generos_proyectos;
    }

/**
 * TOASTS
 * toastr()->success('Success Message');
 * toastr()->error('Error Message');
 * toastr()->info('Info Message');
 * toastr()->warning('Warning Message');
 */


// CHANGE PASSWORD
//************************************************************ */
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

//Todas las funciones relacionadas con el cambio y actualización de contraseña
 
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'contraseña' => 'required|same:confirmar_contraseña',
        'confirmar_contraseña' => 'required',
    ]);


    $user = Auth::user();
    $user->password = bcrypt($request->get('contraseña'));

    $user->save();
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
        $generos_juegos = genre_games();
        $generos_proyectos = genre_projects();  
        toastr()->success('Contraseña Actualizada Correctamente');
        return view('user',['suscripcion'=>$suscripcion,'usuario'=>$user,'juegos'=>$juegos,'proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
})->middleware('auth');

 
Route::get('/user-password-reset', function(Request $request){
    $email = Auth::user()->email;
    $token = Auth::user()->password;
    return view('auth.passwords.reset', ['token'=>$token,'email'=>$email]);
})->middleware('auth');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
});


Route::post('/forget-password-reset', function(Request $request){
    $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'contraseña' => 'required|same:confirmar_contraseña',
            'confirmar_contraseña' => 'required',
    ]);
    $user= User::where('email','like',$request->input('email')) -> first();
    $user->password = bcrypt($request->get('contraseña'));
    $user->save();
    toastr()->success('Se ha cambiado la contraseña. Por favor, vuelve a Iniciar Sesión.');
    $noticias = DB::table('news')->get();
    $juegos = DB::table('games')->orderBy('id', 'desc')->limit(6)->get();
    $proyectos = DB::table('projects')->orderBy('id', 'desc')->limit(6)->get();
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('index',['noticias'=>$noticias, 'juegos'=>$juegos, 'proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


//Proceso mediante el que el usuario puede enviar un Mail a la atención de los admins de Play To Play

Route::post('/send-mail', function(Request $request){
    $email = $request->get('email');
    Mail::send('mail', [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'msg' => $request->get('message'),
        'type'=> $request->get('type'),
        'tel'=>$request->get('tel')],
        function ($message) {
                $message->from('playtoplayapp@gmail.com');
                $message->to('playtoplayapp@gmail.com', 'Alderan')
                ->subject('Mensaje de Usuario - Play To Play');
    });  
    toastr()->success('Mensaje Enviado Correctamente');  
    return redirect("/home");
});

//Funciones de pago mediante PayPal

Route::post('/paypal', function (Request $request) {
    $tipo = $request->input('tipo_compra');
    $codigo = $request->input('codigo');
    $precio = $request->input('precio');
    $nombre = $request->input('nombre');
    return view('paypal_fake',['codigo'=>$codigo, 'precio'=>$precio, 'nombre'=>$nombre, 'tipo'=>$tipo]);
})->middleware('auth');

Route::post('/paypal_pay', function () {
    return view('paypal_pay');
})->middleware('auth');

//Función de página de contacto

Route::get('/contact', function () {
$generos_juegos = genre_games();
$generos_proyectos = genre_projects();                
return view('contact',['generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

//Función de página de ayuda

Route::get('/help', function () {
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
return view('help',['generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

//Función que muestra todos los juegos y sus búsquedas

Route::get('/games_all', function (Request $request) {
    if($request->busqueda!=""){
        if($request->price=='price-min'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')->where('name','LIKE',$busqueda)->orderBy('price', 'asc')->get();
        }else if($request->price=='price-max'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')->where('name','LIKE',$busqueda)->orderBy('price', 'desc')->get();
        }else{
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')->where('name','LIKE',$busqueda)->get();
        }
    }else{
        if($request->price=='price-min'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')->orderBy('price', 'asc')->get();
        }else if($request->price=='price-max'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')->orderBy('price', 'desc')->get();
        }else{
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')->orderBy('name', 'asc')->get();
        }
    }
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('games_all',['juegos'=>$juegos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

//Función que muestra todos los proyectos y sus búsquedas

Route::get('/projects_all', function (Request $request) {
    if($request->busqueda!=""){
        $busqueda= '%'.$request->busqueda.'%';
        $proyectos = DB::table('projects')->where('name','LIKE',$busqueda)->get();
    }else{
        $proyectos = DB::table('projects')->orderBy('name', 'asc')->get();
    }
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('projects_all',['proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

//Función que muestra los juegos por género y permite buscar

Route::get('/genre_games/{genre}', function (Request $request, $genre) {
    if($request->busqueda!=""){
        if($request->price=='price-min'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('games.*, genres.name as genre')
            ->where([['games.name','LIKE',$busqueda], ['genres.name', '=', $genre]])
            ->orderBy('price', 'asc')->get();
        }else if($request->price=='price-max'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('games.*, genres.name as genre')
            ->where([['games.name','LIKE',$busqueda], ['genres.name', '=', $genre]])
            ->orderBy('price', 'desc')->get();
        }else{
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('games.*, genres.name as genre')
            ->where([['games.name','LIKE',$busqueda], ['genres.name', '=', $genre]])
            ->get();
        }
    }else{
        if($request->price=='price-min'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('games.*, genres.name as genre')
            ->where('genres.name', '=', $genre)
            ->orderBy('price', 'asc')->get();
        }else if($request->price=='price-max'){
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('games.*, genres.name as genre')
            ->where('genres.name', '=', $genre)
            ->orderBy('price', 'desc')->get();
        }else{
            $busqueda= '%'.$request->busqueda.'%';
            $juegos = DB::table('games')
            ->join('genres', 'games.genre', '=', 'genres.id')
            ->selectRaw('games.*, genres.name as genre')
            ->where('genres.name', '=', $genre)
            ->get();
        }
    }
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();   
    return view('genre_games',['juegos'=>$juegos, 'genreGame' => $genre, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

//Función que muestra los proyectos por género y permite buscar

Route::get('/genre_projects/{genre}', function (Request $request, $genre) {
    if($request->busqueda!=""){
        $busqueda= '%'.$request->busqueda.'%';
        $proyectos = DB::table('projects')
                ->join('genres', 'projects.genre', '=', 'genres.id')
                ->selectRaw('projects.*, genres.name as genre')
                ->where([['genres.name', '=', $genre],['projects.name','LIKE',$busqueda]])
                ->get();
    }else{
        $proyectos = DB::table('projects')
            ->join('genres', 'projects.genre', '=', 'genres.id')
            ->selectRaw('projects.*, genres.name as genre')
            ->where('genres.name', '=', $genre)->get();    
    }
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();   
    return view('genre_projects',['proyectos'=>$proyectos, 'genreGame' => $genre, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});

//Todas las funciones relacionadas con la página de un juego concreto

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
    $novedad = False;
    $novedades= DB::table('games')
        ->selectRaw('games.id')
        ->orderBy('id', 'desc')
        ->where('price','<>',0)
        ->limit(6)
        ->get();

    foreach($novedades as $item){
        if($item->id == $id){
            $novedad = True;
        }
    }    
    $juego = DB::table('games')->where('id', '=', $id)->get();
    $comentarios = DB::table('game_commentaries')
            ->join('users', 'users.id', '=', 'game_commentaries.id_user')
            ->select('game_commentaries.*', 'users.name', 'users.avatar')
            ->where('game_commentaries.id_game', '=', $id)
            ->orderBy('game_commentaries.id', 'asc')
            ->get();
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('game',['novedad'=>$novedad,'pertenece'=>$pertenece,'juego'=>$juego, 'comentarios'=>$comentarios, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


//Todas las funciones relacionadas con la página de un proyecto concreto

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
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('project',['proyecto'=>$proyecto, 'comentarios'=>$comentarios, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});



//Función de la biblioteca/dashboard del usuario

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
        $total_projects = Project::select('projects.*')
                ->join('portfolio', 'portfolio.id_project', '=','projects.id')
                ->where('portfolio.id_creator','=', $id)
                ->count();        
        $proyectos = DB::table('projects')
                ->join('portfolio', 'portfolio.id_project', '=','projects.id')
                ->where('portfolio.id_creator','=', $id)
                ->get();
        $generos_juegos = genre_games();
        $generos_proyectos = genre_projects();  
        return view('user',["total_projects"=>$total_projects,'suscripcion'=>$suscripcion,'usuario'=>$user,'juegos'=>$juegos,'proyectos'=>$proyectos, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
})->middleware('auth');


//Función que muestra la página de planes

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
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('plans',['userPlans'=>$userPlans,'suscripcion'=>$suscripcion,'creatorPlans'=>$creatorPlans,'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
})->middleware('auth');


//Función que permite actualizar el plan del usuario

Route::get('/plans/update', function (Request $request) { 
    $tipoPlan = $request->input('plan');
    $tipoPlanUsuario = $request->input('plans-user');
    $tipoPlanCreador = $request->input('plans-creator');
    if($request->input('plans-user')!=""){
        $tipoPlanNuevo = $request->input('plans-user');
    }
    if($request->input('plans-creator')!=""){
        $tipoPlanNuevo = $request->input('plans-creator');
    }
    $Role_User = DB::table('role_user')->where('user_id', '=', Auth::user()->id)->get();
    $info_actual = DB::table('plans')->where('role', '=', $Role_User[0]->role_id)->get();
    $info_nuevo = DB::table('plans')->where('role', '=', $tipoPlanNuevo)->get();    
    $rol_name = DB::table('roles')->select('name')->where('id', '=', 2)->get();
    $generos_juegos = genre_games();
    $generos_proyectos = genre_projects();  
    return view('plansPay',["info_actual"=>$info_actual,"info_nuevo"=>$info_nuevo,'Role_User'=>$Role_User,'tipoPlan'=>$tipoPlan,'tipoPlanNuevo'=>$tipoPlanNuevo, 'generos_juegos'=>$generos_juegos, 'generos_proyectos'=>$generos_proyectos]);
});


//Funciones varias que realizan los CRUDS de juegos, proyectos y algunas actualizaciones de varias tablas

Route::get("/games/download/{archives}", "App\Http\Controllers\GamesController@download");

Route::resource("games", "App\Http\Controllers\GamesController")->parameters(["games"=>"game"])->middleware('auth');
Route::resource("projects", "App\Http\Controllers\ProjectsController")->parameters(["projects"=>"project"])->middleware('auth');

Route::resource("profile_edit", "App\Http\Controllers\ProfileController")->middleware('auth');
Route::post('/store_profile', 'App\Http\Controllers\ProfileController@show');

Route::post('/update_plan/{id}', 'App\Http\Controllers\Role_UserController@update');

Route::post('user', 'App\Http\Controllers\LibraryController@store');

Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::post('/user/update', ['as' => 'user.update', 'uses' => 'App\Http\Controllers\UserController@update']);