<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_values', function (Blueprint $table) {
            $table->increments('id');
			$table->string('Phase 1 Voltage (L-N)');
			$table->string('Phase 2 Voltage (L-N)');
			$table->string('Phase 3 Voltage (L-N)');
			$table->string('Average Voltage (L-N)');
			$table->string('Phase 1 Voltage (L-L)');
			$table->string('Phase 2 Voltage (L-L)');
			$table->string('Phase 3 Voltage (L-L)');
			$table->string('Average Voltage (L-L)');
			$table->string('Phase 1 Current');
			$table->string('Phase 2 Current');
			$table->string('Phase 3 Current');
			$table->string('Total Current');
			$table->string('Phase 1 cos pi');
			$table->string('Phase 2 cos pi');
			$table->string('Phase 3 cos pi');
			$table->string('Phase 1 Power Factor');
			$table->string('Phase 2 Power Factor');
			$table->string('Phase 3 Power Factor');
			$table->string('System Power Factor');
			$table->string('Phase 1 Active Power');
			$table->string('Phase 2 Active Power');
			$table->string('Phase 3 Active Power');
			$table->string('Total Active Power');
			$table->string('Phase 1 Reactive Power');
			$table->string('Phase 2 Reactive Power');
			$table->string('Phase 3 Reactive Power');
			$table->string('Total Reactive Power');
			$table->string('Phase 1 Apparent Power');
			$table->string('Phase 2 Apparent Power');
			$table->string('Phase 3 Apparent Power');
			$table->string('Total Apparent Power');
			$table->string('Phase 1 THDV');
			$table->string('Phase 2 THDV');
			$table->string('Phase 3 THDV');
			$table->string('Phase 1 THDI');
			$table->string('Phase 2 THDI');
			$table->string('Phase 3 THDI');
			$table->string('System Frequency');
			$table->string('Neutral Current');
			$table->string('Export Active Energy T1');
			$table->string('Export Reactive Energy T1');
            $table->dateTime('waktu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('device_values');
    }
}
