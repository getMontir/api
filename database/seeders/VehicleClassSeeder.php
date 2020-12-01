<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleClassSeeder extends Seeder
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
                'name_id' => 'Bebek',
                'name_en' => 'Moped'
            ],
            [
                'name_id' => 'Matic',
                'name_en' => 'Matic'
            ],
            [
                'name_id' => 'Sporty',
                'name_en' => 'Sporty'
            ],
            [
                'name_id' => 'Moge',
                'name_en' => 'Big Motorcycle'
            ],
        ];

        foreach( $data as $item ) {
            $item['created_at'] = new Carbon();
            $item['updated_at'] = new Carbon();

            DB::table('vehicle_classes')->insert($item);
        }
    }
}
