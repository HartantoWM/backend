<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route untuk menampilkan semua hewan
Route::get('/animals', [AnimalController::class, 'index']);

//Route untuk menambahkan hewan 
Route::post('/animals', [AnimalController::class, 'store']);

//route untuk mengedit hewan
Route::put('/animals', [AnimalController::class, 'update']);

//route untuk menghapus hewan
Route::delete('/animals', [AnimalController::class, 'destroy']);


//membuat route student
Route::get("/students", [StudentController::class, "index"]);
//method post
Route::post('/students', [StudentController::class, 'store']);
//method put
Route::put('/students/{id}', [StudentController::class, 'update']);
//method delete
Route::delete('/students/{id}', [StudentController::class, 'destroy']);