
<?php
	//use Illuminate\Http\Request;
	//use App\Http\Requests;
	use App\DeviceRegisters;
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
Route::get('/user', 'konten1@user');

Route::get('/device_register', 'konten1@device_register');
//for edit
	Route::get('device_register_edit/{id?}', function($id = null)
	{
			
		$task = DeviceRegisters::find($id);		
		return Response::json($task);
	});
//end edit
Route::get('/device_setting', 'konten1@device_setting');
Route::get('/device_trending', 'konten1@device_trending');
Route::get('/device_monitoring', 'konten1@device_monitoring');
Route::get('/consumption', 'konten1@consumption');
Route::get('/billing', 'konten1@billing');
Route::get('/cetakbilling', 'konten1@cetakbilling');

/*

Route::get('/user', 'konten1@user');
Route::get('/konten1', 'konten1@index');
Route::get('/jon', 'konten1@bubu');
Route::get('/jon2', 'konten1@bubu2');
Route::get('/device', 'konten1@deviceRegister');
Route::get('/', function () {
    return view('konten1@device_monitoring');
});
))*/
Route::auth();

Route::get('/', 'konten1@index');
