<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
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
                'name_id' => 'ACCU',
                'name_en' => 'ACCU'
            ],
            [
                'name_id' => 'Ban Dalam',
                'name_en' => 'Inner Tube'
            ],
            [
                'name_id' => 'Ban Luar',
                'name_en' => 'Outer Tire'
            ],
            [
                'name_id' => 'Ban Luar Tubles',
                'name_en' => 'Outer Tire Tubles'
            ],
            [
                'name_id' => 'Bohlam Lampu',
                'name_en' => 'Lightbulb'
            ],
            [
                'name_id' => 'Busi',
                'name_en' => 'Spark Plugs'
            ],
            [
                'name_id' => 'Karburator',
                'name_en' => 'Carburetor'
            ],
            [
                'name_id' => 'Gear Set',
                'name_en' => 'Gear Set'
            ],
            [
                'name_id' => 'Kampas Kopling',
                'name_en' => 'Clutch Canvas'
            ],
            [
                'name_id' => 'Kampas Rem Belakang',
                'name_en' => 'Rear Brake Lining'
            ],
            [
                'name_id' => 'Kampas Rem Depan',
                'name_en' => 'Front Brake Lining'
            ],
            [
                'name_id' => 'Karet Tromol',
                'name_en' => 'Drum Rubber'
            ],
            [
                'name_id' => 'Kunci Kontak',
                'name_en' => 'Ignition Key'
            ],
            [
                'name_id' => 'Laher Roda',
                'name_en' => 'Laher Wheel'
            ],
            [
                'name_id' => 'Oli',
                'name_en' => 'Oil'
            ],
            [
                'name_id' => 'Lain - lain',
                'name_en' => 'Others'
            ],
            [
                'name_id' => 'Reflektor',
                'name_en' => 'Reflector'
            ],
            [
                'name_id' => 'Roller',
                'name_en' => 'Roller'
            ],
            [
                'name_id' => 'Vanbelt',
                'name_en' => 'Vanbelt'
            ],
            [
                'name_id' => 'Baut',
                'name_en' => 'Bolt'
            ],
            [
                'name_id' => 'Filter Udara',
                'name_en' => 'Air Filter'
            ],
        ];
        $new_data = [];
        foreach( $data as $item ) {
            $item['slug'] = Str::slug( $item['name_id'] );
            $item['created_at'] = new Carbon();
            $item['updated_at'] = new Carbon();
            $new_data[] = $item;
        }

        DB::table('categories')->insert( $new_data );
    }
}
