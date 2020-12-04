<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceChildrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $childs = [
            72 => [
                76, 98, 97, 96, 95, 79, 77
            ],
            73 => [
                76, 98, 97, 96, 95, 79, 77, 83, 78, 75
            ],
            74 => [
                76, 98, 97, 96, 95, 79, 77, 83, 78, 75, 81, 80
            ],
            75 => [
                3, 8, 7, 6, 5, 4
            ],
            76 => [
                11, 10, 25, 24
            ],
            77 => [
                14, 13, 12, 9
            ],
            78 => [
                15
            ],
            79 => [
                18, 19
            ],
            80 => [
                23, 22
            ],
            81 => [
                27
            ],
            82 => [
                82, 17, 16
            ],
            83 => [
                85, 88, 90, 91, 92, 93, 94, 21, 20, 30
            ],
            84 => [
                86, 87, 89
            ]
        ];
        foreach( $childs as $parent => $child ) {
            foreach( $child as $item ) {
                DB::table('service_childrens')->insert([
                    'parent_id' => $parent,
                    'child_id' => $item,
                    'created_at' => new Carbon(),
                    'updated_at' => new Carbon()
                ]);
            }
        }
    }
}
