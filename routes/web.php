<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TeamController;
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
    return view('welcome');
})->name('home');

/*
 * Here i had to use Laravel's Route::namespace function, but
 * in Laravel 8 there is challenges with namespace declaration,
 * so I just used direct resource function
 */
Route::resource('teams', TeamController::class);

Route::get('/teams/{team}/points', [TeamController::class,'points']);
/*
 * Here we can specify Model type hint as function(\App\Model\Team $team)
 * and it will automatically bind with corresponding model, so service
 * provider we specified can treat its parameter as Model object
*/
Route::get('/teams/{team}/title', function($team){
    return response()->jTitle($team);
});

Route::get('/teams/{team}/activate', function(){
    return view('team/activate');
})->name('activateTeam')->middleware('signed');

Route::group(['namespace' => 'Web', 'prefix' => 'testing'], function(){

    // Code below will not work because of namespace declaration specificity in Laravel 8
    // Route::resource('teams', TeamController::class);

    Route::get('/ping', function(){
        return response()->json([
            'resource' => 'ping'
        ]);
    });
});

Route::get('/square/{number?}', function($number = 10){
    return $number * $number;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
