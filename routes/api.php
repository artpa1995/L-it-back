<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\About;
use App\Http\Controllers\Service;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PagesItemsController;
use App\Http\Controllers\MessageController;

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

Route::get('getHeaderDataVue', [HeaderController::class, 'getHeaderDataVue']);

Route::post('sendMessage', [MessageController::class, 'sendMessage']);
