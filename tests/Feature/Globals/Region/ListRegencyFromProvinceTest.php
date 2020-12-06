<?php

namespace Tests\Feature\Globals\Region;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListRegencyFromProvinceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->withHeaders(_api_headers())->postJson('/api/province/cities', [
            'province_id' => '2M9yZrjxp7GpJoYQGkmP'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => array()
            ]);
    }
}
