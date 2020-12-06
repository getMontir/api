<?php

namespace Tests\Feature\Globals\Region;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListDistrictFromRegencyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->withHeaders(_api_headers())->postJson('/api/city/districts', [
            'city_id' => 'qBN2wdVLb14O9v83DlyY'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => array()
            ]);
    }
}
