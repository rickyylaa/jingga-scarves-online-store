<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `color`, `material`, `size`,`description`, `image`, `price`, `qty`, `weight`, `status`, `created_at`, `updated_at`) VALUES
        (1, 'Prayer Hijab White', 'prayer-hijab-white', '4', 'White', 'Silk', 'S, M, L, XL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'prayer-hijab-white.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (2, 'Prayer Hijab Black', 'prayer-hijab-black', '4', 'Black', 'Silk', 'S, M, L, XL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'prayer-hijab-black.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (3, 'Prayer Hijab Navy Blue', 'prayer-hijab-navy-blue', '4', 'Navy Blue', 'Silk', 'S, M, L, XL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'prayer-hijab-navy-blue.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (4, 'Prayer Hijab Brown', 'prayer-hijab-brown', '4', 'Brown', 'Silk', 'S, M, L, XL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'prayer-hijab-brown.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (5, 'Prayer Hijab Sage', 'prayer-hijab-sage', '4', 'Sage', 'Silk', 'S, M, L, XL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'prayer-hijab-sage.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (6, 'Prayer Hijab Grey', 'prayer-hijab-grey', '4', 'Grey', 'Silk', 'S, M, L, XL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'prayer-hijab-grey.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (7, 'Hijab Black', 'hijab-black', '1', 'Black', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-black.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (8, 'Hijab Cream', 'hijab-cream', '1', 'Cream', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-cream.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (9, 'Hijab Navy Blue', 'hijab-navy-blue', '1', 'Navy Blue', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-navy-blue.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (10, 'Hijab Raw Blue', 'hijab-raw-blue', '1', 'Raw Blue', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-raw-blue.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (11, 'Hijab Sage', 'hijab-sage', '1', 'Sage', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-sage.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (12, 'Hijab Soft Grey', 'hijab-soft-grey', '1', 'Soft Grey', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-soft-grey.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (13, 'Hijab Soft Lilac', 'hijab-soft-lilac', '1', 'Soft Lilac', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-soft-lilac.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (14, 'Hijab Soft Pink', 'hijab-soft-pink', '1', 'Soft Pink', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-soft-pink.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (15, 'Hijab Soft Yellow', 'hijab-soft-yellow', '1', 'Soft Yellow', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-soft-yellow.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (16, 'Hijab Dark Grey', 'hijab-dark-grey', '1', 'Dark Grey', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-dark-grey.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (17, 'Hijab Pinky', 'hijab-pinky', '1', 'Pink', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-pinky.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52'),
        (18, 'Hijab Brown Sugar', 'hijab-brown-sugar', '1', 'Brown', 'Voal', '110cm x 110cm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget convallis libero. Proin mollis elementum dapibus. Aliquam finibus quam sit amet lorem bibendum venenatis.', 'hijab-brown-sugar.jpg', '300000', '10', '15', '0', '2023-07-16 12:55:52', '2019-08-29 12:55:52');");
    }
}
