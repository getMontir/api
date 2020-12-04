<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
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
        if( App::environment('local') ) {
            $p1 = 'pZfVLobDJf0SVxBK5ocsNzCmTRejbkZCQ9LJdIR19fyD5_YiU0H2106PpsX3F';
            $p2 = 'bCtgjoy3gGQHAdoyzFbduGhAGr5hQND5Fbt7ggMWNgi10_dcPBmr9cHc5tK9v';
            $p3 = 'XTENKEUwN0OPHNvuuTkSlP2OILKkgmgdr4ausNRCKAJdR_D05CeQFoWoMoht3';
        } else {
            $p1 = Str::random(45) . '_' . Str::random(15);
            $p2 = Str::random(45) . '_' . Str::random(15);
            $p3 = Str::random(45) . '_' . Str::random(15);
        }
        $data = [
        	[
                'name' => 'Dashboard Admin',
                'scope' => serialize([
                    'platform' => 'web',
                    'role' => ['system', 'admin', 'operator']
                ]),
        		'unique_id' => Str::random(60),
        		'dev_public_key' => $p1,
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
        		'dev_public_key' => $p2,
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
        		'dev_public_key' => $p3,
                'dev_secret_key' => Str::random(30) . '-' . Str::random(30),
                'is_enable' => 1
        	],
        ];
        DB::table('developers')->insert($data);
    }
}
