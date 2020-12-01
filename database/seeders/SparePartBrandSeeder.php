<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SparePartBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = [
            'AHM',
            'Aspira',
            'Bina',
            'Binda',
            'Castrol',
            'Champion',
            'Corsa',
            'Depan K1/K3',
            'Enduro',
            'Evalube',
            'Federal',
            'FDRI',
            'GGI Mesin',
            'Honda',
            'Idemitsu',
            'Inferna',
            'IRC',
            'KGW',
            'KM',
            'KPH (Macho)',
            'Lokal',
            'Lokal Depan - Federal',
            'Macho',
            'Mesran',
            'Moxis',
            'MPM',
            'NPP',
            'Orange',
            'Pikoli',
            'SGP',
            'Shell',
            'Suzuki',
            'Thailand',
            'TKDI',
            'TOP 1',
            'WIN',
            'Yamaha',
            'Yamalube',
            'YMH',
            'YTK',
            'Yuasa'
        ];
        $data = [];
        foreach( $brand as $item ) {
            $data[] = [
                'name' => $item,
                'slug' => Str::slug( $item ),
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ];
        }

        DB::table('sparepart_brands')->insert($data);
    }
}
