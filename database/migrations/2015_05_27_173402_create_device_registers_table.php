<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_registers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('register_label_');
			$table->string('register_rtu_');
			$table->string('register_tcp_');
			$table->string('register_size_');
			$table->string('register_multiply_');
            
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
        Schema::drop('device_registers');
    }
}
