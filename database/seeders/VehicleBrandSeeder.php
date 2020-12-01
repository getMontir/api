<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = [
            [
                'name' => 'Honda',
                'type' => 1
            ],
            [
                'name' => 'Yamaha',
                'type' => 1
            ],
            [
                'name' => 'Suzuki',
                'type' => 1
            ],
            [
                'name' => 'Kawasaki',
                'type' => 1
            ],
            [
                'name' => 'Vespa',
                'type' => 1
            ],
        ];

        foreach( $brand as $item ) {
            $item['created_at'] = new Carbon();
            $item['updated_at'] = new Carbon();

            DB::table('vehicle_brands')->insert($item);
        }
    }
}
