<?php

namespace Tests\Feature;

use App\Models\Places\Distrito;
use App\Models\Places\Zona;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ZonaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneGetsZonasWithDistritos()
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

        $response = $this->json('GET','api/zonas');
        
        $response->assertOk()
                    ->assertJsonStructure([
                        0 => [
                            'id',
                            'zona',
                            'distritos' => [
                                0 => [
                                    'id',
                                    'distrito'
                                ],
                                1 => [
                                    'id',
                                    'distrito'
                                ]
                            ]
                        ],
                        1 => [
                            'id',
                            'zona',
                            'distritos' => [
                                0 => [
                                    'id',
                                    'distrito'
                                ],
                                1 => [
                                    'id',
                                    'distrito'
                                ]
                            ]
                        ],
                        2 => [
                            'id',
                            'zona',
                            'distritos' => [
                                0 => [
                                    'id',
                                    'distrito'
                                ],
                                1 => [
                                    'id',
                                    'distrito'
                                ]
                            ]
                        ]
                    ]);
    }
}
