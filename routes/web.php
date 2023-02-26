<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'master-dealer'], function ($router) {
        $router->get('/', 'MasterDealerController@index');
        $router->post('/simpan', 'MasterDealerController@simpan');
        $router->post('/edit', 'MasterDealerController@edit');
        $router->get('/hapus', 'MasterDealerController@hapus');
    });

    Route::group(['prefix' => 'master-menu'], function ($router) {
        $router->get('/', 'MasterMenuController@index');
        $router->post('/simpan', 'MasterMenuController@simpan');
        $router->post('/edit', 'MasterMenuController@edit');
        $router->get('/hapus', 'MasterMenuController@hapus');
    });
    
    Route::group(['prefix' => 'master-ukuran-layar'], function ($router) {
        $router->get('/', 'MasterUkuranLayarController@index');
        $router->post('/simpan', 'MasterUkuranLayarController@simpan');
        $router->post('/edit', 'MasterUkuranLayarController@edit');
        $router->get('/hapus', 'MasterUkuranLayarController@hapus');
    });
    
    Route::group(['prefix' => 'transaksi'], function ($router) {
        $router->get('/', 'TransaksiController@index');
        $router->post('/simpan', 'TransaksiController@simpan');
        $router->post('/edit', 'TransaksiController@edit');
        $router->get('/hapus', 'TransaksiController@hapus');
    });
});

// Auth Bearer Statis
Route::group(['middleware' => 'auth.mitra','prefix' => 'api'], function () use ($router) {

});
// Auth Bearer Statis