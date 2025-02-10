
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPeliculaController;

Route::get('/', function () {

    return view('welcome');
});
