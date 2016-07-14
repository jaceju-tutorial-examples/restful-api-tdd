<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FruitsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     *
     * Test: GET /api.
     */
    public function it_praises_the_fruits()
    {
        $this->get('/api')
            ->seeJson([
                'Fruits' => 'Delicious and healthy!'
            ]);
    }

    /**
     * @test
     *
     * Test: GET /api/fruits.
     */
    public function it_fetches_fruits()
    {
        $this->seed('FruitsTableSeeder');
        $this->get('/api/fruits')
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'name', 'color', 'weight', 'delicious'
                    ]
                ]
            ]);
    }
}
