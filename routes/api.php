<?php

use App\Http\Controllers\api\v1\AddItemController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/v1/add-item/simpan', [AddItemController::class, 'store']);
// Route::get('/v1/add-item', [AddItemController::class, 'index']);
// Route::get('/v1/add-item/{id?}', [AddItemController::class, 'show']);
// Route::post('/v1/add-item/update', [AddItemController::class, 'update']);
// Route::delete('/v1/add-item/hapus/{id?}', [AddItemController::class, 'destroy']);

Route::get('/v1/add_item', [AddItemController::class, 'index']);
Route::post('/v1/add_item', [AddItemController::class, 'store']);
Route::get('/v1/add_item/{addItem}', [AddItemController::class, 'show']);
Route::put('/v1/add_item/{addItem}', [AddItemController::class, 'update']);
Route::delete('/v1/add_item/{addItem}', [AddItemController::class, 'destroy']);
