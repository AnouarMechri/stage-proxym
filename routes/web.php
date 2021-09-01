<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertifController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\PtestController;

use Illuminate\Support\Facades\Route;

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


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/ptest/{id}', [PtestController::class, 'mail']);
Route::get('/ptest', [PtestController::class, 'index']);

Route::post('/result/store', [PtestController::class, 'store']);

Route::post('/answers/store/{id}', [AnswersController::class, 'store']);

Route::get('result/{result}', [HomeController::class, 'result']);

Route::get('index/{certif}', [HomeController::class, 'test']);

Route::get('certifs/check/{certif}', [CertifController::class, 'C_index']);
Route::get('/destroy/{certif}', [CertifController::class, 'destroy']);
Route::get('/destroy/question/{question}', [QuestionsController::class, 'destroy']);
Route::get('/destroy/option/{option}', [OptionsController::class, 'destroy']);
Route::post('options/update/{option}', [OptionsController::class, 'update']);
Route::post('certifs/update/{certif}', [CertifController::class, 'update']);
Route::post('questions/update/{question}', [QuestionsController::class, 'update']);
Route::resource('options', OptionsController::class);
Route::resource('certifs', CertifController::class);
Route::resource('questions', QuestionsController::class);

Route::get('MarkAsRead_all', [CertifController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
	


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});


Route::get('/{page}', [AdminController::class, 'index']);
