<?php

use Illuminate\Database\Seeder;

class DeviceValuesDay extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                  factory(App\DeviceValuesDay::class, 50)->create();
    }
}
