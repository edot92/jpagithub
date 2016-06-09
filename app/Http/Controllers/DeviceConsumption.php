<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\DeviceValuesHour;
use App;
use Response;
use App\DeviceRegisters;
use App\DeviceValuesDay;
use App\DeviceValues;
use App\DeviceValuesMonth;
use App\User;
class DeviceConsumption extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    //getValueByByHour
 public function getValueByHour($waktu)
    {
            str_replace("_", "-", $waktu);
         str_replace("_", "-", $waktu);
     
        $valTempSum="";
        $aa=date_parse($waktu);
        $tahun= $aa['year'];
        $bulan= $aa['month'];
        $tanggal= $aa['day'];
        $valMin = Carbon::create( $tahun,  $bulan,$tanggal, 0,0,0)->toDateTimeString(); 
        $valMax= Carbon::create( $tahun,  $bulan,$tanggal, 23,59,00)->toDateTimeString();

        $values =App\DeviceValuesHour::valueRangeByHourClassConsumption($valMin,$valMax)->get();
        if(count($values)==0) return 0;
            foreach ($values as $kolom) 
            {
               //$valTempSum= "<br>"."" .",".$kolom->waktu .",".$valTempSum."<br>";
                    $valTempSum= "<br>"."" .",".$kolom->waktu .",".$valTempSum."<br>";
            }
        return response ( $values)->header('Content-Type', 'application/json');
    }

    // pengecekan 1 bulan
    public function getValueByBydate($waktu)
    {
            str_replace("_", "-", $waktu);
         str_replace("_", "-", $waktu);
     
        $valTempSum="";
        $aa=date_parse($waktu);
        $tahun= $aa['year'];
        $bulan= $aa['month'];
        $tanggal= $aa['day'];
        $valMin = Carbon::create( $tahun,  $bulan,  1, 0,0,0)->toDateTimeString(); 
        $valMax= Carbon::create( $tahun,  $bulan,  31, 23,59,00)->toDateTimeString();

        $values =App\DeviceValuesDay::valueRangeByDate($valMin,$valMax)->get();
        if(count($values)==0) return 0;
            foreach ($values as $kolom) 
            {
               //$valTempSum= "<br>"."" .",".$kolom->waktu .",".$valTempSum."<br>";
                    $valTempSum= "<br>"."" .",".$kolom->waktu .",".$valTempSum."<br>";
            }
        return response ( $values)->header('Content-Type', 'application/json');
    }
// pengeccekan 1 tahun
     public function getValueByMonth($waktu)
    {
        str_replace("_", "-", $waktu);
        str_replace("_", "-", $waktu);
  
     //    $valMin=$waktu." 00:00:00";
     //    $valMax=$waktu." 23:59:59";
        $aa=date_parse($waktu);
        $valTempSum="";
        $tahun= $aa['year'];
        $bulan= $aa['month'];
        $tanggal= $aa['day'];

        $valMin=$tahun."-01-01";//yyyy-mm-dd
        $valMax=$tahun."-12-31";//yyyy-mm-dd

        $values =App\DeviceValuesMonth::valueTrendingRangeByMonth($valMin,$valMax)->get();
            if(count($values)==0) return 0;
            // foreach ($values as $kolom)
            // {
            //    //$valTempSum= "<br>"."" .",".$kolom->waktu .",".$valTempSum."<br>";
            //         $valTempSum= "<br>"."" .",".$kolom->waktu .",".$valTempSum."<br>";
            // }
        //return $valTempSum;

            return response ( $values)->header('Content-Type', 'application/json');
    }
}
