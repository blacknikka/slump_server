<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function apiTest店一覧取得()
    {
        $response = $this->get('/store/get/all');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'store X',
                    'address' => 'somewhere in Kyoto',
                ]
            ],
        ]);
    }
}
