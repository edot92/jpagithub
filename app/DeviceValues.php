<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceValues extends Model
{
    //
 public function scopeOverVoltage($query)
    {
    	return $query->where('Phase 2 Voltage (L-N)', '>', '400');
    }
    public function scopeHanyaPhase2VoltageLN($query)
    {
    	return $query->select('Phase 2 Voltage (L-N)');
    }
	public function scopeSelectByKolom($query,$namaKolom)
    {
    	//return $query->select('waktu','Phase 2 Voltage (L-N)')->orderBy('waktu', 'asc');
	//return $query->all;
    return $query->select($namaKolom)->orderBy('waktu', 'asc');
    }

    /*
		data ambil hari
		ex 2016-4-10
		select data
		query perjam dan sum+count +average
		return array (jam ,value)
	
    */

     public function scopeValueRangeByDate($query,$valJamMin,$valJamMax)
    {
// $valJamMin="2015-06-02 00:00:00";

// $valJamMax="2015-06-02 23:59:00";
      
     return $query->select('waktu')->where('waktu','>',$valJamMin)->where('waktu','<',$valJamMax)->orderBy('waktu', 'asc');;
    		//return $query->whereBetween('Phase 2 Voltage (L-N)',[1,100]);
    	//return $query->select('Phase 2 Voltage (L-N)');
    }
   
}
