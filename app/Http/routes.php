
<?php
	//use Illuminate\Http\Request;
	//use App\Http\Requests;
	use App\DeviceRegisters;
	use App\User;
	use Illuminate\Http\Request;
	use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	/*************USER*////////////////////
	Route::get('/user', 'UserController@index');
	Route::get('/user/{id?}', 'UserController@show');
Route::get('/useredit/{id?}', 'UserController@edit');
	Route::get('/userinsert', 'UserController@store');	
	Route::get('/userdestroy/{id?}', 'UserController@destroy');
/*************************register ***/
	Route::get('/device_register', 'konten1@device_register');
//for edit
	Route::get('device_register_edit/{id?}', function($id = null)
	{
	$task = DeviceRegisters::find($id);		
	return Response::json($task);
	});
	Route::get('device_register_edit2/{id?}', function(Request $request , $id)
	{
    $id = DeviceRegisters::findOrFail($id);

    $id->id = $request->id;
    $id->register_label_ = $request->register_label_;
  	 $id->register_rtu_ = $request->register_rtu_;
    $id->register_tcp_ = $request->register_tcp_;
    $id->register_size_ = $request->register_size_;
    $id->register_multiply_ = $request->register_multiply_;
    $id->save();
    return Response::json($id );
    });
	
	Route::get('/device_setting', 'konten1@device_setting');

	
	/***********device trending********/
	Route::get('/device_trending', 'TrendingController@index');
	Route::get('/device_trendingdate/{waktumin}/{waktumax}/{jammin}/{jammax}','TrendingController@device_trendingByDate');
/********end device trending *************/
	Route::get('/device_monitoring', 'konten1@device_monitoring');
	Route::get('/consumption', 'konten1@consumption');
	Route::get('/billing', 'konten1@billing');
	Route::get('/cetakbilling', 'konten1@cetakbilling');

Route::auth();

Route::get('/', 'UserController@index');

Route::get('/tes', 'konten1@tes');
