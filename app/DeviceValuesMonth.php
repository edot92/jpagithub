<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceValuesMonth extends Model
{
    //
    public function scopeValueTrendingRangeByMonth($query,$valJamMin,$valJamMax)
    {    
     return $query->select('waktu','Total_Active_Power','Total_Apparent_Power','Total_Reactive_Power')->where('waktu','>=',$valJamMin)->where('waktu','<=',$valJamMax)->orderBy('waktu', 'asc');
    	//return $query->whereBetween('Phase 2 Voltage (L-N)',[1,100]);
    	//return $query->select('Phase 2 Voltage (L-N)');
    }
}
