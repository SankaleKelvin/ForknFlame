<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
        'name'=> 'Kelvin',
        'email'=> 'kelvin@strathmore.edu',
        'password'=>'12345'
        ]);

        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RestaurantSeeder::class);
        $this->call(FoodSeeder::class);
    }
}
