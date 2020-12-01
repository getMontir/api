<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            /**
             * HONDA
             */
            [
                'brand_id' => 1,
                'class_id' => 2,
                'name' => 'Beat'
            ],
            [
                'brand_id' => 1,
                'class_id' => 2,
                'name' => 'Vario'
            ],
            [
                'brand_id' => 1,
                'class_id' => 1,
                'name' => 'Grand'
            ],
            [
                'brand_id' => 1,
                'class_id' => 1,
                'name' => 'Supra'
            ],
            [
                'brand_id' => 1,
                'class_id' => 3,
                'name' => 'Tiger'
            ],
            [
                'brand_id' => 1,
                'class_id' => 2,
                'name' => 'Spacy'
            ],
            [
                'brand_id' => 1,
                'class_id' => 3,
                'name' => 'Mega Pro'
            ],
            [
                'brand_id' => 1,
                'class_id' => 1,
                'name' => 'Karisma'
            ],
            [
                'brand_id' => 1,
                'class_id' => 1,
                'name' => 'Astrea'
            ],
            [
                'brand_id' => 1,
                'class_id' => 2,
                'name' => 'Scoopy'
            ],
            [
                'brand_id' => 1,
                'class_id' => 1,
                'name' => 'Revo'
            ],
            [
                'brand_id' => 1,
                'class_id' => 3,
                'name' => 'Verzha'
            ],
            [
                'brand_id' => 1,
                'class_id' => 1,
                'name' => 'Blade'
            ],
            [
                'brand_id' => 1,
                'class_id' => 4,
                'name' => 'CBR'
            ],
            [
                'brand_id' => 1,
                'class_id' => 3,
                'name' => 'Sonic'
            ],

            /**
             * YAMAHA
             */
            [
                'brand_id' => 2,
                'class_id' => 1,
                'name' => 'Jupiter'
            ],
            [
                'brand_id' => 2,
                'class_id' => 1,
                'name' => 'Vega'
            ],
            [
                'brand_id' => 2,
                'class_id' => 2,
                'name' => 'Mio'
            ],
            [
                'brand_id' => 2,
                'class_id' => 2,
                'name' => 'Fino'
            ],
            [
                'brand_id' => 2,
                'class_id' => 3,
                'name' => 'Vixion'
            ],
            [
                'brand_id' => 2,
                'class_id' => 2,
                'name' => 'Xeon'
            ],
            [
                'brand_id' => 2,
                'class_id' => 2,
                'name' => 'N-Max'
            ],
            [
                'brand_id' => 2,
                'class_id' => 3,
                'name' => 'Scorpio'
            ],
            [
                'brand_id' => 2,
                'class_id' => 3,
                'name' => 'Byson'
            ],
            [
                'brand_id' => 2,
                'class_id' => 3,
                'name' => 'RX King'
            ],
            [
                'brand_id' => 2,
                'class_id' => 2,
                'name' => 'X-Ride'
            ],
            [
                'brand_id' => 2,
                'class_id' => 3,
                'name' => 'YZF-R15'
            ],

            /**
             * SUZUKI
             */
            [
                'brand_id' => 3,
                'class_id' => 1,
                'name' => 'Smash'
            ],
            [
                'brand_id' => 3,
                'class_id' => 1,
                'name' => 'Shogun'
            ],
            [
                'brand_id' => 3,
                'class_id' => 2,
                'name' => 'Sky Wave'
            ],
            [
                'brand_id' => 3,
                'class_id' => 3,
                'name' => 'Satria'
            ],
            [
                'brand_id' => 3,
                'class_id' => 2,
                'name' => 'Spin'
            ],
            [
                'brand_id' => 3,
                'class_id' => 1,
                'name' => 'Address'
            ],
            [
                'brand_id' => 3,
                'class_id' => 1,
                'name' => 'Hayate'
            ],
            [
                'brand_id' => 3,
                'class_id' => 2,
                'name' => 'Lets'
            ],
            [
                'brand_id' => 3,
                'class_id' => 2,
                'name' => 'Nex'
            ],
            [
                'brand_id' => 3,
                'class_id' => 1,
                'name' => 'Shooter'
            ],
            [
                'brand_id' => 3,
                'class_id' => 2,
                'name' => 'Skydrive'
            ],
            [
                'brand_id' => 3,
                'class_id' => 1,
                'name' => 'Thunder'
            ],
            [
                'brand_id' => 3,
                'class_id' => 1,
                'name' => 'Titan'
            ],

            /**
             * KAWASAKI
             */
            [
                'brand_id' => 4,
                'class_id' => 4,
                'name' => 'Ninja'
            ],
            [
                'brand_id' => 4,
                'class_id' => 3,
                'name' => 'KLX'
            ],
            [
                'brand_id' => 4,
                'class_id' => 1,
                'name' => 'Blitz'
            ],
            [
                'brand_id' => 4,
                'class_id' => 1,
                'name' => 'Athelete'
            ],
            [
                'brand_id' => 4,
                'class_id' => 3,
                'name' => 'D-Tracker'
            ],
            [
                'brand_id' => 4,
                'class_id' => 1,
                'name' => 'Kaze'
            ],
        ];

        foreach( $data as $item ) {
            $item['created_at'] = new Carbon();
            $item['updated_at'] = new Carbon();

            DB::table('vehicle_types')->insert($item);
        }
    }
}
