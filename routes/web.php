<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopFans;
use App\Models\Creator;

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
    return view('top_fans_index', ['creators' => Creator::all()]);
});
Route::get('/top_fans/{creator}', [TopFans::class,'getTopFansByRank']);