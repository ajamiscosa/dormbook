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
    return view('admin.index');
});

Route::get('/admin', function(){
    return view('admin.index');
});



Route::get('/login','UserController@showLoginForm');
Route::post('/login','UserController@doLoginProcess');

Route::get('/user','UserController@index');
Route::get('/user/new','UserController@showRegistrationForm');
Route::post('/user/store','UserController@doSaveProcess');
Route::get('/user/{username}/update','UserController@showUpdateForm');
Route::post('/user/{username}/update','UserController@doUpdateProcess');
Route::get('/user/{username}','UserController@showUserInformation');
Route::post('user/{username}/toggle', 'UserController@toggleStatus'); // enabled / disabled
Route::get('/user/data', 'UserController@getAllUserData');

Route::get('/dorm','DormController@index');
Route::get('/dorm/new','DormController@showCreateForm');
Route::post('/dorm/store','UserController@doSaveProcess');
Route::get('/dorm/data', 'DormController@getAllDormData');
Route::get('/dorm/{dormname}/update','DormController@showUpdateForm');
Route::post('/dorm/{dormname}/update','DormController@doUpdateProcess');
Route::get('/dorm/{dormname}','DormController@showDormInformation');
Route::post('dorm/{dormname}/toggle', 'DormController@toggleStatus'); // enabled / disabled

Route::get('/room','RoomController@index');
Route::get('/room/new','RoomController@showCreateForm');
Route::post('/room/store','RoomController@doSaveProcess');
Route::get('/room/{roomname}/update','RoomController@showUpdateForm');
Route::post('/room/{roomname}/update','RoomController@doUpdateProcess');
Route::get('/room/{roomname}','RoomController@showRoomInformation');
Route::post('room/{roomname}/toggle', 'RoomController@toggleStatus'); // enabled / disabled
Route::get('/room/data', 'RoomController@getAllroomData');

Route::get('/dorm/{dormname}/facility','FacilityController@index');
Route::get('/dorm/{dormname}/facility/new','FacilityController@showCreateForm');
Route::post('/dorm/{dormname}/facilities/store','FacilityController@doSaveProcess');
Route::get('/dorm/{dormname}/facilities/{facility}/update','FacilityController@showUpdateForm');
Route::post('/dorm/{dormname}/facilities/{facility}/update','FacilityController@doUpdateProcess');
Route::get('/dorm/{dormname}/facilities/{facility}','FacilityController@showFacilityInformation');
Route::post('dorm/{dormname}/facilities/{facility}/toggle', 'FacilityController@toggleStatus'); // enabled / disabled
Route::get('/dorm/{dormname}/facilities/data', 'FacilityController@getAlldorm/facilitiesData');

Route::get('/testmap', function() {
   $config['center'] = 'Silang, Cavite';
   $config['zoom'] = 14;
   $config['map_height'] = '500px';
   $config['scrollwheel'] = false;

   \FarhanWazir\GoogleMaps\Facades\GMapsFacade::initialize($config);
   $map = \FarhanWazir\GoogleMaps\Facades\GMapsFacade::create_map();

   return view('welcome')->with('map',$map);
});