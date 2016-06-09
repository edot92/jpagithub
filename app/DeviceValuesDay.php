<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceValuesDay extends Model
{
    //
      public function scopeValueRangeByDate($query,$valJamMin,$valJamMax)
    {
		// $valJamMin="2015-06-04 00:00:00";
		 //$valJamMax="2015-06-06 23:59:00";      
		 //return 
		  return $query->select('*')->where('waktu','>=',$valJamMin)->where('waktu','<=',$valJamMax);
    // return $query->where('waktu','>=',$valJamMin)->where('waktu','<=',$valJamMax)->orderBy('waktu', 'asc');
    	//return $query->whereBetween('Phase 2 Voltage (L-N)',[1,100]);
    	//return $query->select('Phase 2 Voltage (L-N)');
    }
}
