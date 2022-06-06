<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(\App\Http\Controllers\AlunoController::class)->group(function (){
    Route::get('/alunos','index');
    Route::get('/alunos/{id}','show');
    Route::post('/alunos', 'store');
    Route::put('/alunos/{id}', 'update');
    Route::delete('/alunos/{id}', 'destroy');
    Route::get('/search','searchAluno');
});

Route::controller(\App\Http\Controllers\CursoController::class)->group(function (){
    Route::get('/cursos','index');
    Route::get('/cursos/{id}','show');
    Route::post('/cursos', 'store');
    Route::put('/cursos/{id}', 'update');
    Route::delete('/cursos/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\MatriculaController::class)->group(function (){
    Route::get('/consultaCurso/{id}','consultaCursosAluno');
    Route::get('/consultaAlunos/{id}','consultaAlunosCurso');
    Route::post('/matricula', 'store');
    Route::put('/matricula/{id}', 'update');
    Route::delete('/matricula/{id}', 'destroy');
});
