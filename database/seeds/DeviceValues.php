<?php

use Illuminate\Database\Seeder;
use App\DeviceValues;
class DeviceValuesSeeder extends Seeder
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
