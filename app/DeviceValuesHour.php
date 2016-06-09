<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceValuesHour extends Model
{


    public function scopeValueRangeByHourClassConsumption($query,$valJamMin,$valJamMax)
    {
        // $valJamMin="2015-06-04 00:00:00";
         //$valJamMax="2015-06-06 23:59:00";      
     return $query->where('waktu','>=',$valJamMin)->where('waktu','<=',$valJamMax)->orderBy('waktu', 'asc');
        //return $query->whereBetween('Phase 2 Voltage (L-N)',[1,100]);
        //return $query->select('Phase 2 Voltage (L-N)');
    }

    //rangenya tetap date hanya + jam = yyyy-mm-dd hh:mm:ss
    public function scopeValueRangeByHour($query,$valJamMin,$valJamMax)
    {
		// $valJamMin="2015-06-04 00:00:00";
		 //$valJamMax="2015-06-06 23:59:00";      
     return $query->where('waktu','>=',$valJamMin)->where('waktu','<=',$valJamMax)->orderBy('waktu', 'asc');
    	//return $query->whereBetween('Phase 2 Voltage (L-N)',[1,100]);
    	//return $query->select('Phase 2 Voltage (L-N)');
    }
     public function scopeValueTrendingRangeByDate($query,$valJamMin,$valJamMax)
    {    
     return $query->select('waktu','Total_Active_Power','Total_Apparent_Power','Total_Reactive_Power')->where('waktu','>=',$valJamMin)->where('waktu','<=',$valJamMax)->orderBy('waktu', 'asc');
    	//return $query->whereBetween('Phase 2 Voltage (L-N)',[1,100]);
    	//return $query->select('Phase 2 Voltage (L-N)');
    }
}
