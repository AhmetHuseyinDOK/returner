<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Client;
use App\Models\Customer;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Client::class,function(Faker $faker){
    return [
        'company_name' => $faker->company,
    ];
});

$factory->define(Customer::class,function(Faker $faker){
    return [
        'client_customer_id' => $faker->unique()->randomNumber($nbDigits = 3),
        'name' =>  $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber
    ];
});

$factory->define(Product::class,function(Faker $faker){
    return [
        'url' => "/product/".($id = $faker->unique()->randomNumber($nbDigits = 3)),
        'name' => $faker->sentence($nbWords = 3),
        'client_product_id'=> $id,
        'price' => rand(20,200)
    ];
});