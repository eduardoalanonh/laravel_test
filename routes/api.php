<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\NumberPreferencesController;
use Illuminate\Support\Facades\Route;

//public routes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    //customers
    Route::get('/customers', [CustomerController::class, 'getCustomerCollection']);
    Route::get('/customers/{id}', [CustomerController::class, 'getCustomer']);
    Route::put('/customers/{id}', [CustomerController::class, 'editCustomer']);
    Route::post('/customers', [CustomerController::class, 'storeCustomer']);
    Route::delete('/customers/{id}', [CustomerController::class, 'destroyCustomer']);
    //numbers
    Route::post('/customers/{id}/numbers', [NumberController::class, 'storeNumbers']);
    Route::get('/customers/{id}/numbers', [NumberController::class, 'getNumberCollection']);
    Route::get('/customers/{id}/numbers/{numberId}', [NumberController::class, 'getNumberResource']);
    Route::delete('customers/{id}/numbers/{numberId}', [NumberController::class, 'destroyNumber']);
    Route::put('customers/{id}/numbers/{numberId}', [NumberController::class, 'editNumber']);
    //numbers_preferences
    Route::post('/customers/{id}/numbers/{numberId}/number-preferences', [NumberPreferencesController::class, 'storeNumberPreferences']);
    Route::get('/customers/{id}/numbers/{numberId}/number-preferences', [NumberPreferencesController::class, 'getNumberPreferencesCollection']);
    Route::delete('/customers/{id}/numbers/{numberId}/number-preferences/{numberPreferenceId}', [NumberPreferencesController::class, 'destroyNumberPreferences']);
    Route::put('/customers/{id}/numbers/{numberId}/number-preferences/{numberPreferenceId}', [NumberPreferencesController::class, 'editNumberPreferences']);
});


