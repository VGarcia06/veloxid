<?php

namespace Tests\Feature;

use App\Models\Places\Distrito;
use App\Models\Places\Zona;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DistritoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneGetsDistritos()
    {
        $this->seed();

        $zonas = factory(Zona::class, 3)
                    ->create()
                    ->each(function ($zona)
                    {
                        $zona->distritos()->createMany(
                            factory(Distrito::class, 2)->make()->toArray()
                        );
                    });

        $response = $this->json('GET','api/distritos');
        
        $response->assertOk()
                    ->assertJsonStructure([
                        0 => [
                            'id',
                            'distrito',
                            'zona' => [
                                'id',
                                'zona'
                            ]
                        ],
                        1 => [
                            'id',
                            'distrito',
                            'zona' => [
                                'id',
                                'zona'
                            ]
                        ],
                        2 => [
                            'id',
                            'distrito',
                            'zona' => [
                                'id',
                                'zona'
                            ]
                        ],
                        3 => [
                            'id',
                            'distrito',
                            'zona' => [
                                'id',
                                'zona'
                            ]
                        ]
                    ]);
    }
}
