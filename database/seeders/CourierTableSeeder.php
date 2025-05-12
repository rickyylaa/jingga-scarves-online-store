<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `couriers` (`id`, `province_id`, `name`, `cost`, `created_at`, `updated_at`) VALUES
        (1, 1, 'JNE', '23681', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (2, 2, 'JNE', '23764', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (3, 3, 'JNE', '23951', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (4, 4, 'JNE', '23654', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (5, 5, 'JNE', '23719', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (6, 6, 'JNE', '24785', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (7, 7, 'JNE', '24476', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (8, 8, 'JNE', '24511', '2019-08-29 12:55:53', '2019-08-29 12:55:53'),
        (9, 9, 'JNE', '24611', '2019-08-29 12:55:53', '2019-08-29 12:55:53');");
    }
}
