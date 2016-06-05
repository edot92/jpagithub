<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Response;
use App\Http\Requests;
use App\DeviceRegisters;
use App\DeviceValuesDay;
use App\DeviceValues;
use App\User;
/*
use App\Http\Requests;
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
*/
class TrendingController extends Controller
{

public function tes()
    {
        return "tes";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

            $yourFirstChart["chart"] = array("type" => "line");
        $yourFirstChart["title"] = array("text" => "Daily Average Voltage R,S,T");
        $yourFirstChart["xAxis"] = array("categories" => ['1', '2', '3','4']);
        $yourFirstChart["yAxis"] = array("title" => array("text" => "Fruit eaten"));
        
        $yourFirstChart["series"] = [
        array("name" => "Jane", "data" => [1,0,4]),
        array("name" => "John", "data" => [5,7,3])
        ];
        
        return view('page.device_trending2', compact('yourFirstChart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






    /**
     * Update view chart form query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function device_trendingByDate(Request $request, $waktumin, $waktumax)
    {
        $waktubulan=$request->bulan;
        $waktuTahun=$request->tahun;
        
        $valtemp="2015-06-02";
        //$valTempSum="<!DOCTYPE html><html><body>";
        $valTempSum="";
        $x=10;
        $val;
        str_replace("_", "-", $waktumin);
         str_replace("_", "-", $waktumax);
      
            // $valMin=$valtemp . " ".sprintf('%2d:00:00',$x);
            // $valMax=$valtemp ." ".sprintf('%2d:00:59',$x);
         // jam
         //for($x=0;$x<24;$x++)
         //{
           // $valMin=$waktu . " "."00:00:00";
            //$valMax=$waktu . " "."23:59:59";
            //$valMin="2016-06-05 00:00:00";
            //$valMax="2016-06-05 23:00:00";

          //  $valMin="2016-1-1 23:59:59";
          //  $valMax="2016-1-5 23:59:59";
         $valMin=$waktumin." 23:59:59";
         $valMax=$waktumax." 23:59:59";
       $values =App\DeviceValuesDay::valueRangeByDate($valMin,$valMax)->get();
            if(count($values)==0) return 0;
            foreach ($values as $kolom) 
            {
               $valTempSum= "<br>".$kolom->Phase_1_Voltage_LN .",".$kolom->waktu .",".$valTempSum."<br>";

            }
 //echo $valTempSum;
        //}
            return response ( $values)->header('Content-Type', 'application/json');
}


}
