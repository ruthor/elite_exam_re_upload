<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\CrewDocumentsController;
use App\Http\Controllers\CrewListController;
use App\Http\Controllers\CrewProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RanksController;
use App\Http\Controllers\UserTypesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/documents', [DocumentsController::class, 'index']);
Route::post('/documents', [DocumentsController::class, 'store']);
Route::get('/documents/{id}', [DocumentsController::class, 'show']);
Route::get('/documents/{id}/edit', [DocumentsController::class, 'edit']);
Route::put('/documents/{id}/edit', [DocumentsController::class, 'update']);
Route::delete('/documents/{id}/delete', [DocumentsController::class, 'destroy']);

Route::get('/crewprofile', [CrewProfileController::class, 'index']);
Route::post('/crewprofile', [CrewProfileController::class, 'store']);
Route::get('/crewprofile/{id}', [CrewProfileController::class, 'show']);
Route::get('/crewprofile/{id}/edit', [CrewProfileController::class, 'edit']);
Route::put('/crewprofile/{id}/edit', [CrewProfileController::class, 'update']);
Route::delete('/crewprofile/{id}/delete', [CrewProfileController::class, 'destroy']);

Route::get('/crewdocuments', [CrewDocumentsController::class, 'index']);
Route::post('/crewdocuments', [CrewDocumentsController::class, 'store']);
Route::get('/crewdocuments/{id}', [CrewDocumentsController::class, 'show']);
Route::get('/crewdocuments/{id}/edit', [CrewDocumentsController::class, 'edit']);
Route::put('/crewdocuments/{id}/edit', [CrewDocumentsController::class, 'update']);
Route::delete('/crewdocuments/{id}/delete', [CrewDocumentsController::class, 'destroy']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/login/{id}', [LoginController::class, 'show']);
Route::get('/login/{id}/edit', [LoginController::class, 'edit']);
Route::put('/login/{id}/edit', [LoginController::class, 'update']);
Route::delete('/login/{id}/delete', [LoginController::class, 'destroy']);


Route::get('/ranks', [RanksController::class, 'index']);
Route::post('/ranks', [RanksController::class, 'store']);
Route::get('/ranks/{id}', [RanksController::class, 'show']);
Route::get('/ranks/{id}/edit', [RanksController::class, 'edit']);
Route::put('/ranks/{id}/edit', [RanksController::class, 'update']);
Route::delete('/ranks/{id}/delete', [RanksController::class, 'destroy']);

Route::get('/usertypes', [UserTypesController::class, 'index']);
Route::post('/usertypes', [UserTypesController::class, 'store']);
Route::get('/usertypes/{id}', [UserTypesController::class, 'show']);
Route::get('/usertypes/{id}/edit', [UserTypesController::class, 'edit']);
Route::put('/usertypes/{id}/edit', [UserTypesController::class, 'update']);
Route::delete('/usertypes/{id}/delete', [UserTypesController::class, 'destroy']);

Route::get('/crewlist', [CrewListController::class, 'index']);
Route::delete('/crewlist/{id}/delete', [CrewListController::class, 'destroy']);

Route::post('/auth/login', [LoginController::class, 'loginUser']);

