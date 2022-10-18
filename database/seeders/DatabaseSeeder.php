<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory(1)->create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password' => bcrypt('admin12345'),
             'role' => 'admin',
             'user_state' => 0,
         ]);

        DB::table('services')->insert([
            [
                'id' => 1,
                'name' => 'vip',
                'description' => 'vip service to 10 days',
                'term' => 10,
                'show_term' => '10 Дней',
                'price' => 3.00,
            ],
            [
                'id' => 2,
                'name' => 'vip',
                'description' => 'vip service to 30 days',
                'term' => 30,
                'show_term' => '30 Дней',
                'price' => 7.00,
            ],
            [
                'id' => 3,
                'name' => 'vip',
                'description' => 'vip service to 90 days',
                'term' => 90,
                'show_term' => '90 Дней',
                'price' => 15.00,
            ],
            [
                'id' => 4,
                'name' => 'top',
                'description' => 'top service to 10 days',
                'term' => 10,
                'show_term' => '10 Дней',
                'price' => 4.00,
            ],
            [
                'id' => 5,
                'name' => 'top',
                'description' => 'top service to 30 days',
                'term' => 30,
                'show_term' => '30 Дней',
                'price' => 9.00,
            ],
            [
                'id' => 6,
                'name' => 'top',
                'description' => 'top service to 90 days',
                'term' => 90,
                'show_term' => '90 Дней',
                'price' => 20.00,
            ],
            [
                'id' => 7,
                'name' => 'premium',
                'description' => 'premium service to 10 days',
                'term' => 10,
                'show_term' => '10 Дней',
                'price' => 5.00,
            ],
            [
                'id' => 8,
                'name' => 'premium',
                'description' => 'premium service to 30 days',
                'term' => 30,
                'show_term' => '30 Дней',
                'price' => 12.00,
            ],
            [
                'id' => 9,
                'name' => 'premium',
                'description' => 'premium service to 90 days',
                'term' => 90,
                'show_term' => '90 Дней',
                'price' => 25.00,
            ],
            [
                'id' => 10,
                'name' => 'banner',
                'description' => 'Баннер на главной странице сайта на 10 Дней',
                'term' => 10,
                'show_term' => '10 Дней',
                'price' => 5.00,
            ],
            [
                'id' => 11,
                'name' => 'banner',
                'description' => 'Баннер на главной странице сайта на 30 Дней',
                'term' => 30,
                'show_term' => '30 Дней',
                'price' => 10.00,
            ],
            [
                'id' => 12,
                'name' => 'banner',
                'description' => 'Баннер на главной странице сайта на 90 Дней',
                'term' => 90,
                'show_term' => '90 Дней',
                'price' => 20.00,
            ]
        ]);

        DB::table('banners')->insert([
            [
                'id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'user_id' => 1,
            ],
            [
                'id' => 7,
                'user_id' => 1,
            ]
        ]);
    }
}
