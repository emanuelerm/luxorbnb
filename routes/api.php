<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\VisitController;
use App\Models\Visit;
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

Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/{slug}', [PropertyController::class, 'show']);

Route::get('/messages', [MessageController::class, 'index']); // Elenco dei messaggi
Route::post('/messages/{slug}', [MessageController::class, 'store']); // Creazione di un nuovo messaggio

Route::get('visits', [VisitController::class,'index']);
Route::post('/visits', [VisitController::class, 'store']);
