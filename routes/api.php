<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/crud')->group(function (){
    Route::get('all', [CrudController::class, 'all']);
    Route::post('store', [CrudController::class, 'store']);
    Route::delete('remove', [CrudController::class, 'remove']);
});

Route::prefix('/categories')->group(function (){
    Route::get('all', [CategoriesController::class, 'all']);
    Route::post('store', [CategoriesController::class, 'store']);
    Route::delete('remove', [CategoriesController::class, 'remove']);
});
