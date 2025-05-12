<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
        (1, 'Hijab', 'hijab', '2023-07-16 12:55:52', '2023-07-16 12:55:52'),
        (2, 'Shirt', 'shirt', '2023-07-16 12:55:52', '2023-07-16 16:55:52'),
        (3, 'Robe', 'robe', '2023-07-16 12:55:52', '2023-07-16 12:55:52'),
        (4, 'Prayer Hijab', 'prayer-hijab', '2023-07-16 12:55:52', '2023-07-16 12:55:52');");
    }
}
