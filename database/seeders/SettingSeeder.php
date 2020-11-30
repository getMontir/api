<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
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
                'user_id' => 1,
                'language' => 'id',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ]
        ];

        DB::table('settings')->insert($data);
    }
}
