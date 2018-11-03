<?php

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

// store系取得
Route::get('/store/get/all', 'StoreDataController@getAllData');
Route::get('/store/get/id/{store_id}', 'StoreDataController@getDataById');
Route::get('/store/get/name/{name}', 'StoreDataController@getOneDataByName');

// store内のmachine一覧取得
Route::get('/machine/get/machines/store_id/{store_id}', 'MachineDataController@getMachinesListByStoreID');

// machine系取得
// 基本情報取得
Route::get('/machine/get/base/store_id/{store_id}/{machine_no}', 'MachineDataController@getBaseDataByMachineNo');
Route::get('/machine/get/base/store_id/{store_id}/{machine_no}/{date}', 'MachineDataController@getBaseDataByMachineNo');
// 当たり情報取得
Route::get('/machine/get/hits/store_id/{store_id}/{machine_no}/{date}', 'MachineDataController@getHitsDataByMachineNo');
// history取得
Route::get('/machine/get/histories/store_id/{store_id}/{machine_no}/{date}', 'HistoryController@getHistoryDataById');

// slump系取得
Route::get('/slump/get/store_id/{store_id}/{machine_no}/{date}', 'SlumpDataController@getSlumpDataByMachineNo');

// image取得
Route::get('/image/get/{machine_id}/{hit_name}', 'ImageController@getImage');

// ranking取得
Route::get('/ranking/get/total/{store_id}/{kind}', 'RankingController@getRanking');
Route::get('/ranking/get/month/{store_id}/{kind}/{date}', 'RankingController@getRankingMonth');

// 端末からのPOST受付
// baseのgame情報
Route::post('/client/game/base', 'ClientConnectController@setBaseGameInfo');
