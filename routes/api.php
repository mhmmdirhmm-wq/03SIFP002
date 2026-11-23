<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;

Route::get('/check',function(){
    return response()->json(['message' => 'API route works']);
});

//route mahasiswa sederhana

Route::get('/mahasiswa',[MahasiswaController::class,'index']);
Route::get('/mahasiswa/{id}',[MahasiswaController::class,'show']);
Route::post('/mahasiswa',[MahasiswaController::class,'store']);
Route::put('/mahasiswa/{id}',[MahasiswaController::class,'update']);
Route::delete('/mahasiswa/{id',[MahasiswaController::class,'destroy']);