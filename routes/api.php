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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::group(['middleware' => ['auth:api']], function () {
    // AddItem apis
    Route::get('/v1/add_item', [AddItemController::class, 'index']);
    Route::post('/v1/add_item', [AddItemController::class, 'store']);
    Route::get('/v1/add_item/{addItem}', [AddItemController::class, 'show']);
    Route::put('/v1/add_item/{addItem}', [AddItemController::class, 'update']);
    Route::delete('/v1/add_item/{addItem}', [AddItemController::class, 'destroy']);

    // Category apis
    Route::get('/v1/category', [CategoryController::class, 'index']);
    Route::post('/v1/category', [CategoryController::class, 'store']);
    Route::get('/v1/category/{category}', [CategoryController::class, 'show']);
    Route::put('/v1/category/{category}', [CategoryController::class, 'update']);
    Route::delete('/v1/category/{category}', [CategoryController::class, 'destroy']);

    // Item apis
    Route::get('/v1/item', [ItemController::class, 'index']);
    Route::post('/v1/item', [ItemController::class, 'store']);
    Route::get('/v1/item/{item}', [ItemController::class, 'show']);
    Route::put('/v1/item/{item}', [ItemController::class, 'update']);
    Route::delete('/v1/item/{item}', [ItemController::class, 'destroy']);    

    // ItemUnit apis
    Route::get('/v1/item_unit', [ItemUnitController::class, 'index']);
    Route::post('/v1/item_unit', [ItemUnitController::class, 'store']);
    Route::get('/v1/item_unit/{itemUnit}', [ItemUnitController::class, 'show']);
    Route::put('/v1/item_unit/{itemUnit}', [ItemUnitController::class, 'update']);
    Route::delete('/v1/item_unit/{itemUnit}', [ItemUnitController::class, 'destroy']);

    // LoanItem apis
    Route::get('/v1/loan_item', [LoanItemController::class, 'index']);
    Route::post('/v1/loan_item', [LoanItemController::class, 'store']);
    Route::get('/v1/loan_item/{loanItem}', [LoanItemController::class, 'show']);
    Route::put('/v1/loan_item/{loanItem}', [LoanItemController::class, 'update']);
    Route::delete('/v1/loan_item/{loanItem}', [LoanItemController::class, 'destroy']);

    // LoanRequest apis
    Route::get('/v1/loan_request', [LoanRequestController::class, 'index']);
    Route::post('/v1/loan_request', [LoanRequestController::class, 'store']);
    Route::get('/v1/loan_request/{loanRequest}', [LoanRequestController::class, 'show']);
    Route::put('/v1/loan_request/{loanRequest}', [LoanRequestController::class, 'update']);
    Route::delete('/v1/loan_request/{loanRequest}', [LoanRequestController::class, 'destroy']);

    // ReduceItem apis
    Route::get('/v1/reduce_item', [ReduceItemController::class, 'index']);
    Route::post('/v1/reduce_item', [ReduceItemController::class, 'store']);
    Route::get('/v1/reduce_item/{reduceItem}', [ReduceItemController::class, 'show']);
    Route::put('/v1/reduce_item/{reduceItem}', [ReduceItemController::class, 'update']);
    Route::delete('/v1/reduce_item/{reduceItem}', [ReduceItemController::class, 'destroy']);

    // ReturnItem apis
    Route::get('/v1/return_item', [ReturnItemController::class, 'index']);
    Route::post('/v1/return_item', [ReturnItemController::class, 'store']);
    Route::get('/v1/return_item/{returnItem}', [ReturnItemController::class, 'show']);
    Route::put('/v1/return_item/{returnItem}', [ReturnItemController::class, 'update']);
    Route::delete('/v1/return_item/{returnItem}', [ReturnItemController::class, 'destroy']);

    // Role apis
    Route::get('/v1/role', [RoleController::class, 'index']);
    // Route::post('/v1/role', [RoleController::class, 'store']);
    Route::get('/v1/role/{role}', [RoleController::class, 'show']);
    // Route::put('/v1/role/{role}', [RoleController::class, 'update']);
    // Route::delete('/v1/role/{role}', [RoleController::class, 'destroy']);

    // SuperCategory apis
    Route::get('/v1/super_category', [SuperCategoryController::class, 'index']);
    Route::post('/v1/super_category', [SuperCategoryController::class, 'store']);
    Route::get('/v1/super_category/{superCategory}', [SuperCategoryController::class, 'show']);
    Route::put('/v1/super_category/{superCategory}', [SuperCategoryController::class, 'update']);
    Route::delete('/v1/super_category/{superCategory}', [SuperCategoryController::class, 'destroy']);

    // User apis
    Route::get('/v1/user', [UserController::class, 'index']);
    // Route::post('/v1/user', [UserController::class, 'store']);
    Route::get('/v1/user/{user}', [UserController::class, 'show']);
    // Route::put('/v1/user/{user}', [UserController::class, 'update']);
    // Route::delete('/v1/user/{user}', [UserController::class, 'destroy']);
});


/**
 * route "/user"
 * @method "GET"
 */


// Route::post('/v1/add-item/simpan', [AddItemController::class, 'store']);
// Route::get('/v1/add-item', [AddItemController::class, 'index']);
// Route::get('/v1/add-item/{id?}', [AddItemController::class, 'show']);
// Route::post('/v1/add-item/update', [AddItemController::class, 'update']);
// Route::delete('/v1/add-item/hapus/{id?}', [AddItemController::class, 'destroy']);