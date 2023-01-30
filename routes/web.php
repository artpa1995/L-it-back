<?php


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\About;
use App\Http\Controllers\Service;
use App\Http\Controllers\Contact;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PagesItemsController;
use App\Http\Controllers\obyektner;
use App\Http\Controllers\AshxatakicController;

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/home', function () {
    return view('Home');
})->name('home');

Route::get('/about', function () {
    return view('About');
})->name('about');

Route::get('/ashxatakicner', function () {
    return view('ashxatakicner');
})->name('ashxatakicner');

Route::get('/obyektner', function () {
    return view('obyektner');
})->name('obyektner');

Route::get('/header', function () {
    return view('L-itConfig.header');
})->name('header');
Route::get('/footer', function () {
    return view('L-itConfig.footer');
})->name('footer');

Route::get('/team', function () {
    return view('Team');
})->name('team');

Route::get('/contact', function () {
    return view('Contact');
})->name('contact');

Route::get('/service', function () {
    return view('Service');
})->name('service');

Route::get('/menu', function () {
    return view('Menu');
})->name('menu');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('messages', function () {
    return view('Messages');
})->name('messages');

Route::get('message', function () {
    return view('Message');
})->name('message');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [About::class, 'getall']);
Route::get('/service', [Service::class, 'getall']);
Route::get('/contact', [Contact::class, 'getall']);
Route::get('/obyektner', [obyektner::class, 'getall']);
Route::get('/ashxatakicner', [AshxatakicController::class, 'getall']);


Route::controller(HomePageController::class)->group(function () {
    Route::post('/homePage', 'submit')->name('homePage');
    Route::get('/getHomeData', 'getHomeData');
    Route::get('/home', 'getall');
});

Route::get('/menu', [MenuController::class, 'getMenuDataAll']);
Route::post('/menuPage/{id}', [MenuController::class, 'submit'])->name('menuPage');
Route::get('/getMenuData', [MenuController::class, 'getMenuData']);

Route::get('/header', [HeaderController::class, 'getHeaderDataAll']);
Route::post('/headerPage/{id}', [HeaderController::class, 'submit'])->name('headerPage');
Route::get('/getHeaderData', [HeaderController::class, 'getHeaderData']);


Route::controller(TeamController::class)->group(function () {

    Route::get('/add-image','addImage')->name('images.add');
    Route::post('/teame/{id}/{lang}', 'storeImage')->name('teame');
    Route::get('/team','viewImage')->name('images.view');
    Route::post('/teameAjax','teameAjax')->name('teameAjax');
    Route::post('/workerCreate','workerCreate')->name('workerCreate');
    Route::get('/removeWorker/{id}',  'removeWorker')->name('removeWorker');

});

// Route::get('/add-image',[TeamController::class,'addImage'])->name('images.add');
// Route::post('/teame/{id}/{lang}', [TeamController::class,'storeImage'])->name('teame');
// Route::get('/team',[TeamController::class,'viewImage'])->name('images.view');
// Route::post('/teameAjax',[TeamController::class,'teameAjax'])->name('teameAjax');
// Route::post('/workerCreate',[TeamController::class,'workerCreate'])->name('workerCreate');
// Route::get('/removeWorker/{id}', [TeamController::class, 'removeWorker'])->name('removeWorker');




Route::get('/footer',[FooterController::class,'getFotterDataAll'])->name('getFotterDataAll');
Route::post('/updateFooter/{id}', [FooterController::class, 'updateFooter'])->name('updateFooter');

/* unikal*/
Route::post('/updatePageItem/{id}/{page_id}/{lang}/{page}', [PagesItemsController::class,'updatePageItem'])->name('updatePageItem');
Route::post('/setPageItem/{id}/{page}', [PagesItemsController::class,'setPageItem'])->name('setPageItem');
Route::get('/removePageItem/{key}/{page}', [PagesItemsController::class,'removePageItem'])->name('removePageItem');
Route::post('/getPageAjax',[PagesItemsController::class,'getPageAjax'])->name('getPageAjax');
Route::post('/addPageIqons/{id}/{page}', [PagesItemsController::class, 'addPageIqons'])->name('addPageIqons');
Route::post('/updatePageIqon/{id}/{page_id}/{page}', [PagesItemsController::class,'updatePageIiqon'])->name('updatePageIqon');


Route::get('/messages',[MessageController::class,'getAllMessage'])->name('messages');
Route::get('/removeMessage/{id}', [MessageController::class, 'removeMessage'])->name('removeMessage');


Route::get('/message/{id}', [MessageController::class, 'message'])->name('message');
Route::post('/message/{id}', [MessageController::class, 'changestatus'])->name('changestatus');

Route::get('/newmessage', [MessageController::class, 'newmessage'])->name('newmessage');




Route::controller(obyektner::class)->group(function () {
    Route::post('/addObyekt', 'addObyekt')->name('addObyekt');
    Route::post('/updateobyekt/{id}', 'updateobyekt')->name('updateobyekt');
    Route::get('/obyekt/{id}', 'obyekt')->name('obyekt');
    Route::get('/obyekt_delete/{id}', 'obyekt_delete')->name('obyekt_delete');
});

Route::controller(AshxatakicController::class)->group(function () {
    Route::post('/addworker', 'addworker')->name('addworker');
    Route::post('/updateworker/{id}', 'updateworker')->name('updateworker');
    Route::get('/worker/{id}', 'worker')->name('worker');
    Route::post('/addDocuments/{id}', 'addDocuments')->name('addDocuments');
    Route::get('/worker_delete/{id}', 'worker_delete')->name('worker_delete');
});