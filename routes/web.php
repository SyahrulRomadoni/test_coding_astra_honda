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

// Project 2
// Gambungkan 2 End Point
$router->get('p2/json1', 'Project2Controller@json1');
$router->get('p2/json2', 'Project2Controller@json2');
$router->get('p2/json3', 'Project2Controller@json3');
$router->get('p2/json4', 'Project2Controller@json4');

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {

    // Auth
    // "/api/register"
    $router->post('register', 'AuthController@register');
    // "/api/login"
    $router->post('login', 'AuthController@login');

    // Request Anime
    // "/api/request_anime/create" to all rule
    $router->post('request_anime/create', 'RequestAnimeController@create');

    // Report Broken Link
    // "/api/report_broken_link/create" to all rule
    $router->post('report_broken_link/create', 'ReportBrokenLinkController@create');

    $router->group(['middleware' => 'auth'], function () use ($router) {

        // Auth
        // "/api/logout"
        $router->post('logout', 'AuthController@logout');

        // Role
        // "/api/role/index"
        $router->get('role/index', 'RoleController@index');
        // "/api/role/create"
        $router->post('role/create', 'RoleController@create');
        // "/api/role/update"
        $router->post('role/update/{id}', 'RoleController@update');
        // "/api/role/delete"
        $router->delete('role/delete/{id}', 'RoleController@delete');
        // "/api/role/search"
        $router->post('role/search', 'RoleController@search');

        // Users
        // "/api/profile"
        $router->get('profile', 'UserController@profile');
        // "/api/users/1"
        $router->get('users/{id}', 'UserController@singleUser');
        // "/api/users"
        $router->get('users', 'UserController@allUsers');

        // Project 1
        // Member
        // "/api/member/index"
        $router->get('member/index', 'MemberController@index');
        // "/api/member/create"
        $router->post('member/create', 'MemberController@create');
        // "/api/member/update"
        $router->post('member/update/{id}', 'MemberController@update');
        // "/api/member/delete"
        $router->delete('member/delete/{id}', 'MemberController@delete');

        // Pesanan
        // "/api/pesanan/index"
        $router->get('pesanan/index', 'PesananController@index');
        // "/api/pesanan/create"
        $router->post('pesanan/create', 'PesananController@create');
        // "/api/pesanan/update"
        $router->post('pesanan/update/{id}', 'PesananController@update');
        // "/api/pesanan/delete"
        $router->delete('pesanan/delete/{id}', 'PesananController@delete');
        
        // Antrian
        // "/api/antrian/index"
        $router->get('antrian/index', 'AntrianController@index');
        // "/api/antrian/kasir"
        $router->get('antrian/kasir', 'AntrianController@antianKasir');
        // "/api/antrian/pembayaran"
        $router->post('antrian/pembayaran/{id}', 'AntrianController@pembayaranPesanan');


        // Log Aktifitas
        // "/api/log_aktifitas/penjualan_hari"
        $router->get('log_aktifitas/penjualan_hari', 'LogAktifitasController@penjualanHari');
        // "/api/log_aktifitas/penjualan_bulan"
        $router->get('log_aktifitas/penjualan_bulan', 'LogAktifitasController@penjualanBulan');
        // "/api/log_aktifitas/penjualan_tahun"
        $router->get('log_aktifitas/penjualan_tahun', 'LogAktifitasController@penjualanTahun');
    
    });
});