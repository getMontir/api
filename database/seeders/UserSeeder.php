<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertUser();
        $this->insertUserDetail();
        $this->insertCustomerDetail();
    }

    private function insertUser() {
        $data = [
            [
                'role_id' => 1,
                'name' => 'Gradle',
                'email' => 'gradle@getmontir.com',
                'password' => bcrypt('admin123'),
                'phonenumber' => '089626092565',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ],
            [
                'role_id' => 4,
                'name' => 'Customer Test',
                'email' => 'customer@getmontir.com',
                'password' => bcrypt('admin123'),
                'phonenumber' => null,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ]
        ];

        DB::table('users')->insert($data);
    }

    private function insertUserDetail() {
        $data = [
            [
                'user_id' => 1,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ]
        ];

        DB::table('user_details')->insert($data);
    }

    private function insertCustomerDetail() {
        $data = [
            [
                'user_id' => 2,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon()
            ]
        ];

        DB::table('customer_details')->insert($data);
    }

}
