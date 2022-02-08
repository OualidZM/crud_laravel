<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =
        [
            [
                'name' => 'test15',
                'email' => 'test15@gmail.com',
                'password' => Hash::make('testeo15'),
                'role' => 'admin'
            ],
            [
                'name' => 'secondContact',
                'email' => 'secondContact@gmail.com',
                'password' => Hash::make('testeo15'),
                'role' => 'admin'
            ],
            [
                'name' => 'test12',
                'email' => 'test12@gmail.com',
                'password' => Hash::make('testeo15'),
                'role' => 'user'
                ]

        ];
        DB::table('users')->insert($user);
    }
}
