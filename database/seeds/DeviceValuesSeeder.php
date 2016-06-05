<?php

use Illuminate\Database\Seeder;

class DeviceValues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          factory(App\DeviceValues::class, 50)->create();
  
    }
}
