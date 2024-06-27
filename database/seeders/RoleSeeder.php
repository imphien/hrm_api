<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
                                       [
                                           'name'   => 'admin',
                                           'guard_name'  => 'web',
                                           'created_at' => Carbon::now(),
                                           'updated_at' => Carbon::now(),
                                       ],
                                       [
                                           'name'   => 'hr',
                                           'guard_name'  => 'web',
                                           'created_at' => Carbon::now(),
                                           'updated_at' => Carbon::now(),
                                       ],
                                       [
                                           'name'   => 'pm',
                                           'guard_name'  => 'web',
                                           'created_at' => Carbon::now(),
                                           'updated_at' => Carbon::now(),
                                       ],
                                       [
                                           'name'   => 'dev',
                                           'guard_name'  => 'web',
                                           'created_at' => Carbon::now(),
                                           'updated_at' => Carbon::now(),
                                       ],
                                   ]);

        DB::table('model_has_roles')->insert([
                                       [
                                           'role_id'   => 1,
                                           'model_id'  => 1,
                                           'model_type' => 'User'
                                       ],
                                       [
                                           'role_id'   => 2,
                                           'model_id'  => 2,
                                           'model_type' => 'User'
                                       ],
                                       [
                                           'role_id'   => 3,
                                           'model_id'  => 3,
                                           'model_type' => 'User'
                                       ],
                                       [
                                           'role_id'   => 4,
                                           'model_id'  => 4,
                                           'model_type' => 'User'
                                       ],
                                   ]);
    }
}
