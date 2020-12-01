<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeveloperSeeder extends Seeder
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
                'name' => 'Dashboard Admin',
                'scope' => serialize([
                    'platform' => 'web',
                    'role' => ['system', 'admin', 'operator']
                ]),
        		'unique_id' => Str::random(60),
        		'dev_public_key' => Str::random(45) . '_' . Str::random(15),
        		'dev_secret_key' => Str::random(30) . '-' . Str::random(30),
                'is_enable' => 1
            ],
            [
                'name' => 'Customer Mobile API',
                'scope' => serialize([
                    'platform' => 'android',
                    'role' => ['customer']
                ]),
        		'unique_id' => Str::random(60),
        		'dev_public_key' => Str::random(45) . '_' . Str::random(15),
                'dev_secret_key' => Str::random(30) . '-' . Str::random(30),
                'is_enable' => 1
            ],
            [
                'name' => 'Station & Mechanic Mobile API',
                'scope' => serialize([
                    'platform' => 'android',
                    'role' => ['station', 'mechanic']
                ]),
        		'unique_id' => Str::random(60),
        		'dev_public_key' => Str::random(45) . '_' . Str::random(15),
                'dev_secret_key' => Str::random(30) . '-' . Str::random(30),
                'is_enable' => 1
        	],
        ];
        DB::table('developers')->insert($data);
    }
}
