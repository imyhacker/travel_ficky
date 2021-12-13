<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Arikun',
            'email' => 'arikun@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'piki',
            'email' => 'ficky@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'user'
        ]);
    }
}
