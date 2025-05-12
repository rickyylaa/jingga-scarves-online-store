<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'image' => 'avatar-2.jpg',
            'name' => 'Inggrit Tia Septiana',
            'email' => 'inggrittiaseptiana@gmail.com',
            'role' => '1',
            'password' => bcrypt('inggrit1234')
        ]);

        $this->call(ProvinceTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(CourierTableSeeder::class);

        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
