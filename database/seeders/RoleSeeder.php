<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'System Administrator',
                'slug' => 'system',
                'level' => 99,
                'is_unmanageable' => 1,
                'is_back' => 1,
                'is_end' => 0,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
            [
                'name' => 'Administrator',
                'slug' => 'admin',
                'level' => 90,
                'is_unmanageable' => 1,
                'is_back' => 1,
                'is_end' => 0,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
            [
                'name' => 'Operator',
                'slug' => 'operator',
                'level' => 80,
                'is_unmanageable' => 1,
                'is_back' => 1,
                'is_end' => 0,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
            [
                'name' => 'Customer',
                'slug' => 'customer',
                'level' => 1,
                'is_unmanageable' => 1,
                'is_back' => 0,
                'is_end' => 1,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
            [
                'name' => 'Station',
                'slug' => 'station',
                'level' => 3,
                'is_unmanageable' => 1,
                'is_back' => 0,
                'is_end' => 1,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
            [
                'name' => 'Mechanic',
                'slug' => 'mechanic',
                'level' => 2,
                'is_unmanageable' => 1,
                'is_back' => 0,
                'is_end' => 1,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
        ];

        DB::table('roles')->insert($data);
    }
}
