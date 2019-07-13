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
        
            // $this->call(UsersTableSeeder::class);
    }
}
