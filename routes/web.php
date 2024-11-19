<?php
//use App\Http\Controllers\AlumnoController;
//use App\Http\Controllers\CursoController;

//Route::get('/', function () {
  //  return view('welcome');
//});

//Route::resource('cursos', CursoController::class);
///Route::resource('alumnos', AlumnoController::class); // Agregamos el prefijo 'alumnos' para generar las rutas correctamente
 //-->

use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('alumnos', AlumnoController::class); #crea todas las rutas para el controlador AlumnoController
Route::resource('cursos', CursoController::class); #crea todas las rutas para el controlador CursoController
