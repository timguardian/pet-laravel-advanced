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
});

/*
 * Here i had to use Laravel's Route::namespace function, but
 * in Laravel 8 there is challenges with namespace declaration,
 * so I just used direct resource function
 */
Route::resource('teams', TeamController::class);
