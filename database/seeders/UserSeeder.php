<?php

namespace Database\Seeders;

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
    }

    private function insertUser() {
        $data = [
            [
                'role_id' => 1,
                'name' => 'Gradle',
                'email' => 'gradle@getmontir.com',
                'password' => bcrypt('admin123'),
                'phonenumber' => '089626092565',
            ],
        ];

        DB::table('users')->insert($data);
    }

    private function insertUserDetail() {
        $data = [
            [
                'user_id' => 1,
            ]
        ];

        DB::table('user_details')->insert($data);
    }

}
