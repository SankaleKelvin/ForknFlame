<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'name'=>'Art Cafe',
            'address'=>'047 Nairobi',
            'description'=>'Art Cafe Restaurant'
        ]);

        Restaurant::create([
            'name'=>'KFC',
            'address'=>'103 Nakuru',
            'description'=>'KFC Restaurant'
        ]);

        Restaurant::create([
            'name'=>'Chicken Inn',
            'address'=>'001 Mombasa',
            'description'=>'Chicken Inn Restaurant'
        ]);
        
        Restaurant::create([
            'name'=>'Fork n Flame',
            'address'=>'210 Nairobi',
            'description'=>'Fork n Flame Restaurant'
        ]);

        Restaurant::create([
            'name'=>'Kilimanjaro',
            'address'=>'391 Madaraka',
            'description'=>'Kilimanjaro Restaurant'
        ]);
    }
}
