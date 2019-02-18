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
    return view('search');
});

Route::get('/admin', function(){
    if(!auth()->check()) {
        return redirect()->to('/login');
    }
    return view('admin.index');
});


Route::post('/sea','DormController@doUpload');
Route::get('/upload','DormController@meUpload');

Route::get('/login','UserController@showLoginForm')->name('login');
Route::post('/login','UserController@doLoginProcess');

Route::get('/logout', 'UserController@doLogoutProcess');

Route::get('/search','DormController@showSearchForm');
Route::post('/search','DormController@doSearchProcess');

Route::get('/user','UserController@index');
Route::get('/user/new','UserController@showRegistrationForm');
Route::post('/user/store','UserController@doSaveProcess');
Route::get('/user/data', 'UserController@getAllUserData');
Route::get('/user/{username}/update','UserController@showUpdateForm');
Route::post('/user/{username}/update','UserController@doUpdateProcess');
Route::get('/user/{username}','UserController@showUserInformation');
Route::post('user/{username}/toggle', 'UserController@toggleStatus'); // enabled / disabled

Route::get('/dorm','DormController@index');
Route::get('/dorm/new','DormController@showCreateForm');
Route::post('/dorm/store','DormController@doSaveProcess');
Route::post('/dorm/amenities','DormController@testAmenities');
Route::get('/dorm/data', 'DormController@getAllDormData');
Route::get('/dorm/view/{dormname}','DormController@showDormInformation');
Route::get('/dorm/update/{dormname}','DormController@showUpdateForm');
Route::post('/dorm/images/{dorm}/upload', 'DormController@uploadImage');
Route::post('/dorm/{dorm}/update','DormController@doUpdateProcess');
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