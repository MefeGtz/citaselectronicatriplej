<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('home');
});
*/



//Route::auth();



Route::get('/', function () {
    if(Auth::check()){
       return  view('home');
    }else{
        return view('auth/login');
    }
    });
    

    Auth::routes();




Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ruta clientes: con las tres peticiones
//Route::resource('/clientes', ClienteController::class);
    Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index']);
    Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create']);
    Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClienteController::class, 'edit']);
    Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'sendData']);
    Route::put('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update']);


    Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy']);

    //para las marcas 
        Route::resource('/marca', App\Http\Controllers\MarcaController::class);
    //para los tipos de aparatos
        Route::resource('/tipoaparato', App\Http\Controllers\TipoaparatoController::class);
        Route::resource('/aparato', App\Http\Controllers\AparatoController::class);
    
    //('users', 'UserController');
    //('/marca',[,'index']);
    
    //para los tecnicos:
        Route::resource('tecnicos', App\Http\Controllers\TecnicoController::class);
        Route::resource('admins', App\Http\Controllers\AdminController::class);

    //para las citas 
    Route::get('/citas/create', [App\Http\Controllers\CitasController::class, 'create']);
    Route::post('/registrarcita', [App\Http\Controllers\CitasController::class, 'store']);
    Route::get('/vercitas', [App\Http\Controllers\CitasController::class, 'index']);
    //tambien se agregara elmotivo de la cancelacion:
    Route::post('/vercitas/{citas}/cancel', [App\Http\Controllers\CitasController::class, 'cancel']);
    Route::post('/vercitas/{citas}/final', [App\Http\Controllers\CitasController::class, 'final']);
   // Route::post('/citas', [App\Http\Controllers\CitasController::class, 'index']);
   // Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\CitasController::class, 'edit']);

   Route::get('/graficas', [App\Http\Controllers\GraficasController::class, 'index']);
   
   //para las graficas:
   Route::get('/graficas/datatec', [App\Http\Controllers\GraficasController::class, 'desempenotecJson']);

   Route::get('/reportescita', [App\Http\Controllers\CitasController::class, 'reportescitas']);
   Route::get('/desemptecnico', [App\Http\Controllers\CitasController::class, 'desemtecnico']);

    });


