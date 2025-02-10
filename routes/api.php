<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPeliculaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeliculaImagenController;
/**
 * @OA\Info(title="Mi API", version="1.0")
 */
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('peliculas', ApiPeliculaController::class);

Route::middleware('auth:sanctum')->group(function () {
	Route::apiResource('users', UserController::class)->except(['store']);
});
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('peliculas', ApiPeliculaController::class);
});
Route::post('users', [UserController::class, 'store']);
//Route::post("login",[UserController::class,'index']);

// Rutas para manejar imágenes de las películas
Route::get('peliculas/{id}/imagenes', [PeliculaImagenController::class, 'show']);
Route::post('peliculas/{id}/imagenes', [PeliculaImagenController::class, 'store']);
Route::delete('peliculas/{id}/imagenes', [PeliculaImagenController::class, 'destroy']);


// routes/api.php
Route::get('docs', function () {
    return view('swagger');
});
