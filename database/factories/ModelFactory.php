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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),

        //personal details
        'phoneNumber' => $faker->phoneNumber,
        'address' => $faker->address,
        'gender' => 'Male',
        'birthday' => $faker->dateTime,
        'icNumber' => $faker->randomDigit(10),

        //employment info
        'employeeNo' => $faker->randomDigit(1000),
        'startDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'position' => $faker->jobTitle,
        'department' => 'Marketing Department',

        //compensation
        'fixedSalary' => $faker->numberBetween(2000, 25000),
        'bankName' => 'Malayan Banking Berhad',
        'bankAccountNumber' => $faker->creditCardNumber(),
        
        'remember_token' => str_random(10),
    ];
});
