<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ExamController;

Route::get('/', function () {
    return view('dashboard/home');
});

//Rotas da Autenticação
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register']);

//Rotas do Tipo
Route::get('/types/new', function () {
    return view('type/form');
});
Route::get('/types', [TypeController::class,'index']);
Route::post('/types/new', [TypeController::class,'store']);
Route::delete('/types/{id}', [TypeController::class,'destroy']);
Route::get('/types/{id}', [TypeController::class,'edit']);
Route::put('/types/{id}', [TypeController::class,'update']);

//Rotas do Exame
Route::get('/exams', [ExamController::class,'index']);
Route::get('/exams/new', [ExamController::class,'create']);
Route::post('/exams/new', [ExamController::class,'store']);
Route::delete('/exams/{id}', [ExamController::class,'destroy']);
Route::get('/exams/{id}', [ExamController::class,'edit']);
Route::put('/exams/{id}', [ExamController::class,'update']);


