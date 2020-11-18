<?php

namespace Tests\Feature;

use App\Models\Product\Category;
use App\Models\Product\Subcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSomeoneGetsCategoriesAndSubcategories()
    {
        $this->seed();

        $categories = factory(Category::class)
                    ->create()
                    ->each(function ($category)
                    {
                        $category->subcategories()->createMany(
                            factory(Subcategory::class, 4)->make([
                                'vehicle_type_id' => 1
                            ])->toArray()
                        );
                    });

        $response = $this->json('GET','api/categories');
        
        $response->assertOk()
                    ->assertJsonStructure([
                        0 => [
                            'id',
                            'nombre',
                            'subcategories' => [
                                0 => [
                                    'id',
                                    'nombre',
                                ],
                                1 => [
                                    'id',
                                    'nombre',
                                ],
                                2 => [
                                    'id',
                                    'nombre',
                                ],
                                3 => [
                                    'id',
                                    'nombre',
                                ]
                            ]
                        ]
                    ]);
    }
}
