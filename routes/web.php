<?php

use Illuminate\Support\Facades\Route;
use MeiliSearch\Client;
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
    $client = new Client('http://127.0.0.1:7700');

    $index = $client->index('users');

    $hits = $index->search('たか')->getHits();

    // ddd($hits);

    return view('welcome');
});
