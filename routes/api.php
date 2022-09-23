<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PFEController;
use App\Http\Controllers\PlaningController;


Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);

    Route::get('etudiant', [EtudiantController::class, 'index']);
    Route::get('etudiant/{id}', [EtudiantController::class, 'show']);
    Route::post('createtud', [EtudiantController::class, 'store']);
    Route::put('update_etu/{etudiant}',  [EtudiantController::class, 'update']);
    Route::delete('delete_etu/{etudiant}',  [EtudiantController::class, 'destroy']);
    //
    Route::get('module', [ModuleController::class, 'index']);
    Route::get('module/{id}', [ModuleController::class, 'show']);
    Route::post('createm', [ModuleController::class, 'store']);
    Route::put('updatem/{module}',  [ModuleController::class, 'update']);
    Route::delete('deletem/{module}',  [ModuleController::class, 'destroy']);
//
Route::get('note', [NoteController::class, 'index']);
Route::get('note/{id}', [NoteController::class, 'show']);
Route::post('createn', [NoteController::class, 'store']);
Route::put('updaten/{note}',  [NoteController::class, 'update']);
Route::delete('deleten/{note}',  [NoteController::class, 'destroy']);
//
Route::get('prof', [ProfController::class, 'index']);
    Route::get('prof/{id}', [ProfController::class, 'show']);
    Route::post('createp', [ProfController::class, 'store']);
    Route::put('updatep/{prof}',  [ProfController::class, 'update']);
    Route::delete('deletep/{prof}',  [ProfController::class, 'destroy']);
    //
    Route::get('planing', [PlaningController::class, 'index']);
    Route::get('planing/{id}', [PlaningController::class, 'show']);
    Route::post('createpl', [PlaningController::class, 'store']);
    Route::put('updatepl/{planing}',  [PlaningController::class, 'update']);
    Route::delete('deletepl/{planing}',  [PlaningController::class, 'destroy']);
    //
    Route::get('pfe', [PFEController::class, 'index']);
    Route::get('pfe/{id}', [PFEController::class, 'show']);
    Route::post('createpfe', [PFEController::class, 'store']);
    Route::put('updatepfe/{pfe}',  [PFEController::class, 'update']);
    Route::delete('deletepfe/{pfe}',  [PFEController::class, 'destroy']);







});
