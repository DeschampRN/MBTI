<?php

use App\Http\Controllers\TipeMbtiController;
use App\Models\TipeMbti;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('listmbti', [TipeMbtiController::class,'getListMbti'])->name('list-mbti');
Route::get('listmbti/{id}', [TipeMbtiController::class,'getDetailMbti'])->name('detail-mbti');
Route::get('pertanyaan/{id}', [TipeMbtiController::class,'getQuestion'])->name('pertanyaan');
Route::get('pertanyaan/{id}/{idJawab}/jawab', [TipeMbtiController::class,'nextQuestion'])->name('jawab');
Route::get('hasil/{userId}', [TipeMbtiController::class,'hasil'])->name('hasil');
Route::post('save-user', [TipeMbtiController::class,'saveName'])->name('save');
