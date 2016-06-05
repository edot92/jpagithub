<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/
$factory->define(App\DeviceValuesDay::class, function (Faker\Generator $faker) 
{
  
    return [
        'Phase 1 Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Average Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Average Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Current'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Current'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Current'=> $faker->numberBetween($min = 350, $max = 480),
'Total Current'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 cos pi'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 cos pi'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 cos pi'=> $faker->numberBetween($min = 350, $max = 480), 
'Phase 1 Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'System Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Total Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Total Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Total Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 THDV'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 THDV'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 THDV'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 THDI'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 THDI'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 THDI'=> $faker->numberBetween($min = 350, $max = 480),
'System Frequency'=> $faker->numberBetween($min = 350, $max = 480),
'Neutral Current'=> $faker->numberBetween($min = 350, $max = 480),
'Export Active Energy T1'=> $faker->numberBetween($min = 350, $max = 480),
'Export Reactive Energy T1'=> $faker->numberBetween($min = 350, $max = 480),
//'waktu'=> $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = date_default_timezone_get()),
'waktu'=> $faker->dateTimeInInterval($startDate = '-1 years', $interval = '+ 5 days', $timezone = date_default_timezone_get()), // DateTime('2003-03-15 02:00:49', 'Antartica/Vostok')


    ];
});


$factory->define(App\DeviceValues::class, function (Faker\Generator $faker) 
{
    return [
'Phase 1 Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Average Voltage (L-N)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Average Voltage (L-L)'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Current'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Current'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Current'=> $faker->numberBetween($min = 350, $max = 480),
'Total Current'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 cos pi'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 cos pi'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 cos pi'=> $faker->numberBetween($min = 350, $max = 480), 
'Phase 1 Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'System Power Factor'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Total Active Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Total Reactive Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Total Apparent Power'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 THDV'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 THDV'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 THDV'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 1 THDI'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 2 THDI'=> $faker->numberBetween($min = 350, $max = 480),
'Phase 3 THDI'=> $faker->numberBetween($min = 350, $max = 480),
'System Frequency'=> $faker->numberBetween($min = 350, $max = 480),
'Neutral Current'=> $faker->numberBetween($min = 350, $max = 480),
'Export Active Energy T1'=> $faker->numberBetween($min = 350, $max = 480),
'Export Reactive Energy T1'=> $faker->numberBetween($min = 350, $max = 480),
//'waktu'=> $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = date_default_timezone_get()),
'waktu'=> $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 24 hours', $timezone = date_default_timezone_get()), // DateTime('2003-03-15 02:00:49', 'Antartica/Vostok')


    ];
});