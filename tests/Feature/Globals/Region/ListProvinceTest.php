<?php

namespace Tests\Feature\Globals\Region;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProvinceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->withHeaders(_api_headers())->json('GET', '/api/provinces');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => array()
            ]);
    }
}
