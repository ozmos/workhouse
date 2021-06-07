<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PropertyDataTest extends TestCase
{

    use RefreshDatabase;

    public function testApiEndPoint()
    {
        $response = $this->getJson('/api/properties');
        $response->assertStatus(200);
    }

    public function testDataUploaded()
    {
        $this->assertDatabaseCount('property_data', 49);
    }

    public function testSpecificRecordExists()
    {
        $this->assertDatabaseHas('property_data', [
            'name' => 'The Ashbrook',
            'address' => 'Parkwood, W.A.',
            'price' => 247900,
            'bedrooms' => 3,
            'bathrooms' => 1,
            'garages' => 2,
            'frontage' => 16,
            'image' => 'https://workhouseadvertising.com.au/test-data/images/11.jpg'
        ]);
    }

    public function testQueryReturnsEmpty()
    {
        $response = $this->json('GET', '/api/properties?garages=5')
            ->assertJson([]);
    }

    public function testAllQueryParameters()
    {
        $response = $this->json('GET', '/api/properties?name=b&address=north&priceMin=100000&priceMax=200000&bedrooms=4&bathrooms=2&garages=2')
            ->assertJson(fn (AssertableJson $json) =>
            $json->has(1)
                ->first(fn ($json) =>
                    $json->where('id',2)
                    ->where('name', 'The Bronte')
                    ->where('address', 'Northbridge, W.A.')
                    ->etc()
            )
        );
    }
}

