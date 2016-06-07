<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceValuesHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_values_hours', function (Blueprint $table) {
$table->increments('id');          
$table->string('Phase_1_Voltage_LN');
$table->string('Phase_2_Voltage_LN');
$table->string('Phase_3_Voltage_LN');
$table->string('Average_Voltage_LN');
$table->string('Phase_1_Voltage_LL');
$table->string('Phase_2_Voltage_LL');
$table->string('Phase_3_Voltage_LL');
$table->string('Average_Voltage_LL');
$table->string('Phase_1_Current');
$table->string('Phase_2_Current');
$table->string('Phase_3_Current');
$table->string('Total_Current');
$table->string('Phase_1_cos_pi');
$table->string('Phase_2_cos_pi');
$table->string('Phase_3_cos_pi');
$table->string('Phase_1_Power_Factor');
$table->string('Phase_2_Power_Factor');
$table->string('Phase_3_Power_Factor');
$table->string('System_Power_Factor');
$table->string('Phase_1_Active_Power');
$table->string('Phase_2_Active_Power');
$table->string('Phase_3_Active_Power');
$table->string('Total_Active_Power');
$table->string('Phase_1_Reactive_Power');
$table->string('Phase_2_Reactive_Power');
$table->string('Phase_3_Reactive_Power');
$table->string('Total_Reactive_Power');
$table->string('Phase_1_Apparent_Power');
$table->string('Phase_2_Apparent_Power');
$table->string('Phase_3_Apparent_Power');
$table->string('Total_Apparent_Power');
$table->string('Phase_1_THDV');
$table->string('Phase_2_THDV');
$table->string('Phase_3_THDV');
$table->string('Phase_1_THDI');
$table->string('Phase_2_THDI');
$table->string('Phase_3_THDI');
$table->string('System_Frequency');
$table->string('Neutral_Current');
$table->string('Export_Active_Energy_T1');
$table->string('Export_Reactive_Energy_T1');
$table->dateTime('waktu');
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('device_values_hours');
    }
}
