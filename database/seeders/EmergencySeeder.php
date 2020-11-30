<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmergencySeeder extends Seeder
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
                'name' => 'Ban Bocor',
                'slug' => 'ban-bocor',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
            [
                'name' => 'Motor Mogok',
                'slug' => 'motor-mogok',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ]
        ];

        DB::table('emergencies')->insert($data);
    }
}
