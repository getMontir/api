<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('id' => '1','service_id' => '1','category_id' => '021','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '2','service_id' => '2','category_id' => '006','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '3','service_id' => '3','category_id' => '005','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '4','service_id' => '4','category_id' => '005','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '5','service_id' => '5','category_id' => '005','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '6','service_id' => '5','category_id' => '016','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '7','service_id' => '5','category_id' => '005','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '8','service_id' => '5','category_id' => '005','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '9','service_id' => '5','category_id' => '011','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '10','service_id' => '5','category_id' => '010','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '11','service_id' => '5','category_id' => '016','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '12','service_id' => '5','category_id' => '015','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '13','service_id' => '5','category_id' => '015','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '14','service_id' => '5','category_id' => '016','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '15','service_id' => '5','category_id' => '013','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '16','service_id' => '5','category_id' => '011','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '17','service_id' => '5','category_id' => '297','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '18','service_id' => '5','category_id' => '003','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '19','service_id' => '5','category_id' => '002','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '20','service_id' => '5','category_id' => '017','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '21','service_id' => '5','category_id' => '008','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '22','service_id' => '5','category_id' => '003','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '23','service_id' => '5','category_id' => '019','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '24','service_id' => '5','category_id' => '018','created_at' => new Carbon(),'updated_at' => new Carbon()),
            array('id' => '25','service_id' => '5','category_id' => '016','created_at' => new Carbon(),'updated_at' => new Carbon())
        );
        DB::table('service_categories')->insert($data);
    }
}
