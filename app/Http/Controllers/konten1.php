<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DeviceRegisters;
class konten1 extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
	{
		return view('test.template');
	}
	public function user()
	{
		//return view('page.user');
		return view('page.user');
	}
	public function device_setting()
	{
		//return view('page.user');
		return view('page.device_setting');
	}
	public function device_register()
	{
	$deviceRegisters = DeviceRegisters::all();
	//return $deviceRegisters;
	return view('page.device_register')->with(compact('deviceRegisters'));
	}
	
	
	public function device_trending()
	{
		$yourFirstChart["chart"] = array("type" => "line");
		$yourFirstChart["title"] = array("text" => "Daily Average Voltage R,S,T");
		$yourFirstChart["xAxis"] = array("categories" => ['1', '2', '3','4']);
		$yourFirstChart["yAxis"] = array("title" => array("text" => "Fruit eaten"));
		
		$yourFirstChart["series"] = [
        array("name" => "Jane", "data" => [1,0,4]),
        array("name" => "John", "data" => [5,7,3])
		];
		return view('page.device_trending', compact('yourFirstChart'));
		/*return view('page.device_trending');*/
	}
	public function device_monitoring()
	{
		//return view('page.user');
		return view('page.device_monitoring');
	}
	public function consumption()
	{
		//return view('page.user');
		return view('page.consumption');
	}
	public function billing()
	{
		//return view('page.user');
		return view('page.billing');
	}
	/*
	public function deviceRegister()
	{
		$deviceRegisters = DeviceRegister::paginate(10);
//		return $deviceRegisters;
		return view('test.device')->with(compact('deviceRegisters'));
	}
	*/
}
