<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = Storage::disk('local')->get('districts.txt');
        $data = unserialize($file);
        $newData = [];
        foreach( $data as $item ) {
            $name = ucwords( strtolower( $item['name'] ) );
            $a['id'] = $item['id'];
            $a['city_id'] = $item['regency_id'];
            $a['name'] = $name;
            $a['slug'] = Str::slug( $name );
            $a['created_at'] = new Carbon();
            $a['updated_at'] = new Carbon();
            $newData[] = $a;
        }
        DB::table('districts')->insert($newData);
    }
}
