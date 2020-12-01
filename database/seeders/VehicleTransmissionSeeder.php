<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTransmissionSeeder extends Seeder
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
             * BEAT
             */
            [
                'type_id' => 1,
                'engine_id' => 1,
                'name' => '110 Fi',
                'from_year' => 2011,
                'to_year' => 2016
            ],
            [
                'type_id' => 1,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2008,
                'to_year' => 2010
            ],

            /**
             * VARIO
             */
            [
                'type_id' => 2,
                'engine_id' => 2,
                'name' => '125',
                'from_year' => 2012,
                'to_year' => 2013
            ],
            [
                'type_id' => 2,
                'engine_id' => 1,
                'name' => '150',
                'from_year' => 2015,
                'to_year' => 2016
            ],
            [
                'type_id' => 2,
                'engine_id' => 1,
                'name' => 'Techno 125',
                'from_year' => 2012,
                'to_year' => 2015
            ],
            [
                'type_id' => 2,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2006,
                'to_year' => 2013
            ],

            /**
             * GRAND
             */
            [
                'type_id' => 3,
                'engine_id' => 2,
                'name' => '100',
                'from_year' => 2000,
                'to_year' => 2000
            ],

            /**
             * Supra
             */
            [
                'type_id' => 4,
                'engine_id' => 2,
                'name' => 'Fit 100',
                'from_year' => 2003,
                'to_year' => 2016
            ],
            [
                'type_id' => 4,
                'engine_id' => 2,
                'name' => 'X 110',
                'from_year' => 2000,
                'to_year' => 2002
            ],
            [
                'type_id' => 4,
                'engine_id' => 1,
                'name' => 'X 125 Fi',
                'from_year' => 2015,
                'to_year' => 2016
            ],
            [
                'type_id' => 4,
                'engine_id' => 2,
                'name' => 'X 125',
                'from_year' => 2005,
                'to_year' => 2016
            ],

            /**
             * TIGER
             */
            [
                'type_id' => 5,
                'engine_id' => 2,
                'name' => '2000',
                'from_year' => 2000,
                'to_year' => 2007
            ],
            [
                'type_id' => 5,
                'engine_id' => 2,
                'name' => 'Revo',
                'from_year' => 2008,
                'to_year' => 2016
            ],

            /**
             * Spacy
             */
            [
                'type_id' => 6,
                'engine_id' => 1,
                'name' => '110 Fi',
                'from_year' => 2011,
                'to_year' => 2015
            ],

            /**
             * Mega Pro
             */
            [
                'type_id' => 7,
                'engine_id' => 2,
                'name' => '150',
                'from_year' => 2005,
                'to_year' => 2016
            ],
            [
                'type_id' => 7,
                'engine_id' => 1,
                'name' => 'New 150',
                'from_year' => 2012,
                'to_year' => 2016
            ],

            /**
             * Karisma
             */
            [
                'type_id' => 8,
                'engine_id' => 1,
                'name' => '125',
                'from_year' => 2003,
                'to_year' => 2006
            ],

            /**
             * Astrea
             */
            [
                'type_id' => 9,
                'engine_id' => 2,
                'name' => '100',
                'from_year' => 1994,
                'to_year' => 2000
            ],

            /**
             * Scoopy
             */
            [
                'type_id' => 10,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2010,
                'to_year' => 2012
            ],
            [
                'type_id' => 10,
                'engine_id' => 1,
                'name' => '110 Fi',
                'from_year' => 2012,
                'to_year' => 2016
            ],

            /**
             * Revo
             */
            [
                'type_id' => 11,
                'engine_id' => 1,
                'name' => '110 Fi',
                'from_year' => 2014,
                'to_year' => 2016
            ],
            [
                'type_id' => 11,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2007,
                'to_year' => 2014
            ],

            /**
             * Verzha
             */

            /**
             * Blade
             */
            [
                'type_id' => 13,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2010,
                'to_year' => 2014
            ],
            [
                'type_id' => 13,
                'engine_id' => 1,
                'name' => '125 Fi',
                'from_year' => 2015,
                'to_year' => 2016
            ],

            /**
             * CBR
             */

            /**
             * Sonic
             */

            /**
             * Jupiter
             */
            [
                'type_id' => 16,
                'engine_id' => 2,
                'name' => 'MX 135',
                'from_year' => 2010,
                'to_year' => 2016
            ],
            [
                'type_id' => 16,
                'engine_id' => 1,
                'name' => 'Z 113',
                'from_year' => 2003,
                'to_year' => 2006
            ],

            /**
             * Vega
             */
            [
                'type_id' => 17,
                'engine_id' => 2,
                'name' => 'ZR 115',
                'from_year' => 2008,
                'to_year' => 2013
            ],
            [
                'type_id' => 17,
                'engine_id' => 2,
                'name' => 'R 110',
                'from_year' => 2005,
                'to_year' => 2008
            ],

            /**
             * Mio
             */
            [
                'type_id' => 18,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2003,
                'to_year' => 2016
            ],
            [
                'type_id' => 18,
                'engine_id' => 2,
                'name' => 'Soul 110',
                'from_year' => 2007,
                'to_year' => 2012
            ],
            [
                'type_id' => 18,
                'engine_id' => 2,
                'name' => 'J 110',
                'from_year' => 2012,
                'to_year' => 2016
            ],

            /**
             * Fino
             */
            [
                'type_id' => 19,
                'engine_id' => 1,
                'name' => '115 Fi',
                'from_year' => 2012,
                'to_year' => 2016
            ],
            [
                'type_id' => 19,
                'engine_id' => 2,
                'name' => '115',
                'from_year' => 2010,
                'to_year' => 2012
            ],

            /**
             * Vixion
             */
            [
                'type_id' => 20,
                'engine_id' => 2,
                'name' => '150',
                'from_year' => 2007,
                'to_year' => 2016
            ],

            /**
             * Xeon
             */

            /**
             * N-Max
             */

            /**
             * Scorpio
             */
            [
                'type_id' => 23,
                'engine_id' => 2,
                'name' => '225',
                'from_year' => 2013,
                'to_year' => 2015
            ],
            [
                'type_id' => 23,
                'engine_id' => 2,
                'name' => 'New 225',
                'from_year' => 2015,
                'to_year' => 2016
            ],

            /**
             * Byson
             */
            [
                'type_id' => 24,
                'engine_id' => 2,
                'name' => '150',
                'from_year' => 2010,
                'to_year' => 2016
            ],

            /**
             * RX King
             */
            [
                'type_id' => 25,
                'engine_id' => 2,
                'name' => 'King 135',
                'from_year' => 2001,
                'to_year' => 2003
            ],
            [
                'type_id' => 25,
                'engine_id' => 2,
                'name' => 'New King 135',
                'from_year' => 2004,
                'to_year' => 2016
            ],
            [
                'type_id' => 25,
                'engine_id' => 2,
                'name' => 'Z 135',
                'from_year' => 2002,
                'to_year' => 2005
            ],

            /**
             * X-Ride
             */
            [
                'type_id' => 26,
                'engine_id' => 1,
                'name' => '115',
                'from_year' => 2013,
                'to_year' => 2016
            ],

            /**
             * YZF-R15
             */

            /**
             * Smash
             */
            [
                'type_id' => 28,
                'engine_id' => 2,
                'name' => '125',
                'from_year' => 2010,
                'to_year' => 2012
            ],
            [
                'type_id' => 28,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2002,
                'to_year' => 2011
            ],

            /**
             * Shogun
             */
            [
                'type_id' => 29,
                'engine_id' => 2,
                'name' => '125',
                'from_year' => 2007,
                'to_year' => 2011
            ],
            [
                'type_id' => 29,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2006,
                'to_year' => 2008
            ],

            /**
             * Sky Wave
             */
            [
                'type_id' => 30,
                'engine_id' => 2,
                'name' => '125',
                'from_year' => 2007,
                'to_year' => 2011
            ],

            /**
             * Satria
             */
            [
                'type_id' => 31,
                'engine_id' => 1,
                'name' => 'FU 150 Fi',
                'from_year' => 2014,
                'to_year' => 2016
            ],
            [
                'type_id' => 31,
                'engine_id' => 2,
                'name' => '2T 125',
                'from_year' => 2000,
                'to_year' => 2003
            ],
            [
                'type_id' => 31,
                'engine_id' => 2,
                'name' => 'FU 150',
                'from_year' => 2007,
                'to_year' => 2013
            ],

            /**
             * Spin
             */

            /**
             * Address
             */

            /**
             * Hayate
             */

            /**
             * Lets
             */

            /**
             * Nex
             */

            /**
             * Shooter
             */

            /**
             * Skydrive
             */
            [
                'type_id' => 38,
                'engine_id' => 2,
                'name' => '125',
                'from_year' => 2009,
                'to_year' => 2014
            ],

            /**
             * Thunder
             */
            [
                'type_id' => 39,
                'engine_id' => 2,
                'name' => '125',
                'from_year' => 2005,
                'to_year' => 2007
            ],

            /**
             * Titan
             */

            /**
             * Ninja
             */
            [
                'type_id' => 41,
                'engine_id' => 2,
                'name' => 'RR 150',
                'from_year' => 2005,
                'to_year' => 2016
            ],
            [
                'type_id' => 41,
                'engine_id' => 2,
                'name' => 'R 150',
                'from_year' => 2000,
                'to_year' => 2016
            ],

            /**
             * KLX
             */

            /**
             * Blitz
             */
            [
                'type_id' => 43,
                'engine_id' => 2,
                'name' => '125',
                'from_year' => 2003,
                'to_year' => 2015
            ],

            /**
             * Athelete
             */

            /**
             * D-Tracker
             */

            /**
             * Kaze
             */
            [
                'type_id' => 46,
                'engine_id' => 2,
                'name' => '110',
                'from_year' => 2000,
                'to_year' => 2006
            ],
        ];

        foreach( $data as $item ) {
            $item['created_at'] = new Carbon();
            $item['updated_at'] = new Carbon();

            DB::table('vehicle_transmissions')->insert($item);
        }
    }
}
