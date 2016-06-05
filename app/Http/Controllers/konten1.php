<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\DeviceRegisters;
use App\DeviceValuesDay;
use App\DeviceValues;
use App\User;

use PDF;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
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

		$users=User::all();

		return view('page.user')->with(compact('users'));;
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
	}

	/*
		data ambil hari
		ex 2016-4-10
		select data
		query perjam dan sum+count +average
		return array (jam ,value)
	
    */
	public function device_trendingDate($waktu)
	{
        $valtemp="2015-06-02";
        $valTempSum="<!DOCTYPE html><html><body>";
        $x=10;
        $val;
        str_replace("_", "-", $waktu);
      
        	// $valMin=$valtemp . " ".sprintf('%2d:00:00',$x);
        	// $valMax=$valtemp ." ".sprintf('%2d:00:59',$x);
         // jam
         //for($x=0;$x<24;$x++)
         //{
        	$valMin=$waktu . " "."00:00:00";
        	$valMax=$waktu . " "."23:59:59";
        	//$valMin="2016-06-05 00:00:00";
        	//$valMax="2016-06-05 23:00:00";

       $values =App\DeviceValuesDay::valueRangeByDate($valMin,$valMax)->get();
        	if(count($values)==0) return 0;
        	foreach ($values as $kolom) 
        	{
 			   $valTempSum= "<p>".$kolom->Phase_1_Voltage_LN .",".$kolom->waktu .",".$valTempSum."</p>";

			}
		//}
				return response	( $values)->header('Content-Type', 'application/json');
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

		public function cetakbilling()
	{

	// ambil semua data
	//$provinsi = Provinsi::all();
	// mengarahkan view pada file pdf.blade.php di views/provinsi/
	//$view = View::make('provinsi.pdf', array('provinsi' => $provinsi, 'i' => 0))->render(); 
	// panggil fungsi dompdf
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML('<h1>Test</h1>');
		return $pdf->stream();
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
