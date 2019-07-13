<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon; 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                "name"=>"admin",
            ]
        );

        Role::create(
            [
                "name"=>"user",
            ]
        );

        $user = new User();
        $user->name= "admin";
        $user->email = "admin@admin.com";
        $user->password = Hash::make("admin");
        $user->role_id = 1;
        $user->save();

        
        factory(App\User::class,10)->create()->each(function($user){
            $client = $user->clients()->save(factory(App\Models\Client::class)->make());  
            factory(App\Models\Customer::class,50)->create(['client_id'=>$client->id]);  
            factory(App\Models\Product::class,20)->create(['client_id'=>$client->id]);    
        });

        // $this->call(UsersTableSeeder::class);
    }
}
