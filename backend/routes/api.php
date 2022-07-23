<?php

use App\Http\Controllers\TagsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Todo
Route::prefix('todo')->group(function () {
    Route::get('/', [TodoController::class, 'getAll']);
    Route::post('addTodo', [TodoController::class, 'addTodo']);
    Route::delete('removeTodo/{id}', [TodoController::class, 'deleteTodoById']);
    Route::get('/{id}', [TodoController::class, 'getById']);
});


// Tags
Route::prefix('tags')->group(function () {
    Route::post('addTags', [TagsController::class, 'create']);
    Route::get('/', [TagsController::class, 'getAll']);
    Route::get('{id}', [TagsController::class, 'getById']);
    Route::delete('deleteTags/{id}', [TagsController::class, 'destroy']);
});


// oke tash po du me kriju ni relationship qe me mujt me ba tags ne ni todo
