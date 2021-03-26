<?php

use App\User;
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

// if this was more complex I'd move it to a controller, but for something this small it works here
Route::get('/', function () {
    $user = new User();

    if (Request::has('ip_address')) {
        $user->setIp(request('ip_address'));
    }

    return view('welcome', [
        'ipAddress' => $user->getIp(),
        'weather' => $user->weather()
    ]);
});
