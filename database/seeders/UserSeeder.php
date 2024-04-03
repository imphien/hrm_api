<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'full_name' => 'admin_phien',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Pa55w0rd'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'hr',
                'full_name' => 'hr_phien',
                'email' => 'hr@gmail.com',
                'password' => bcrypt('Pa55w0rd'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'developer',
                'full_name' => 'dev_phien',
                'email' => 'dev@gmail.com',
                'password' => bcrypt('Pa55w0rd'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'tester',
                'full_name' => 'tester_phien',
                'email' => 'tester@gmail.com',
                'password' => bcrypt('Pa55w0rd'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'pm',
                'full_name' => 'pm_phien',
                'email' => 'pm@gmail.com',
                'password' => bcrypt('Pa55w0rd'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
                                   ]);
    }
}
