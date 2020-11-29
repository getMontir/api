<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = Storage::disk('local')->get('cities.txt');
        $data = unserialize($file);
        $newData = [];
        foreach( $data as $item ) {
            $name = ucwords( strtolower( $item['name'] ) );
            $item['name'] = $name;
            $item['slug'] = Str::slug( $name );
            $item['created_at'] = new Carbon();
            $item['updated_at'] = new Carbon();
            $newData[] = $item;
        }
        DB::table('cities')->insert($newData);
    }
}
