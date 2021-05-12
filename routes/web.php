<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ProductTypeController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function(){
    echo "Hola mundo <br>";
    for ($i=0; $i < 10; $i++) { 
        echo "$i<br>";
    }
});

// Route::get('/prueba', [PruebaController::class, 'hello']);
// Route::get('/prueba/hello', [PruebaController::class, 'hello']);
Route::get('/prueba/hello/{name?}', [PruebaController::class, 'hello']);
Route::get('/prueba/potencias2', [PruebaController::class, 'potencias2']);

//post, delete, put, patch
//resource --> se traduce por 7 rutas
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-----------------------------------------------
//Rutas de ProductType
//Un CRUD necesita 7 rutas
//Puedo escribir todas o usar una ruta 'resource'

//Listado: método index
Route::get('/producttypes', [ProductTypeController::class, 'index']);

//Formulario de alta: método create
Route::get('/producttypes/create', [ProductTypeController::class, 'create']);

//Guardado de formulario de alta: método store
Route::post('/producttypes', [ProductTypeController::class, 'store']);

//Detalle: método show
Route::get('/producttypes/{id}', [ProductTypeController::class, 'show']);

//Formulario de edición: método edit
Route::get('/producttypes/{id}/edit', [ProductTypeController::class, 'edit']);

//Guardado de formulario de edición: método update
Route::put('/producttypes/{id}', [ProductTypeController::class, 'update']);

//Borrado: método destroy
Route::delete('/producttypes/{id}', [ProductTypeController::class, 'destroy']);


//Ruta tipo resource (equivale a las 7 anteriores)
//Route::resource('/producttypes', ProductTypeController::class);

