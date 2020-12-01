<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleEngineSeeder extends Seeder
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
                'name_id' => 'Injeksi',
                'name_en' => 'Injection'
            ],
            [
                'name_id' => 'Karburator',
                'name_en' => 'Carburetor'
            ],
        ];

        foreach( $data as $item ) {
            $item['created_at'] = new Carbon();
            $item['updated_at'] = new Carbon();

            DB::table('vehicle_engines')->insert($item);
        }
    }
}
