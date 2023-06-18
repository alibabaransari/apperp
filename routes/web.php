<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\SliderController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CaseStudyChildController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\PostNewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TestimonalController;
use App\Http\Controllers\WhyChoseUsController;
use App\Http\Controllers\ChartOfAccount;


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

// Route::get('/', function () {
    // return view('welcome');
    Route::get('/', [HomeController::class, 'site'])->name('site');
// Route::get('/',[HomeController::class, 'web']);
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Configuration cache created successfully!';
});
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
     Route::get('/admin', [HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::resource('why_chose_us', WhyChoseUsController::class);
    Route::resource('testimonal', TestimonalController::class);
    Route::resource('status', StatusController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('post_new', PostNewController::class);
    Route::resource('our_team', OurTeamController::class);
    Route::resource('case_study', CaseStudyController::class);
    Route::resource('case_study_child', CaseStudyChildController::class);
    Route::resource('about_us', AboutUsController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('cards', CardController::class);

    Route::get('/chart-of-account',[ChartOfAccount::class,'create'])->name('account-create');
    Route::post('/chart-of-account-store',[ChartOfAccount::class,'store'])->name('account-store');
    Route::get('/chart-of-account-list',[ChartOfAccount::class,'index'])->name('account-list');
    Route::get('/chart-of-account-opening',[ChartOfAccount::class,'opening'])->name('account-opening');


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
