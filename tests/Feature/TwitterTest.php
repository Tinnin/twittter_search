<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Cache;

class TwitterTest extends TestCase
{
    /**
     * Test the Twitter API call to get the last 50 tweets with the hashtag
     * "#London" and filter:safe.
     *
     * @return void
     */
    public function testAPI()
    {
        // Get the tweets from the API
        $response = $this->get(route('api.tweets'));
        
        $response->assertStatus(200);
        // Required JSON structure
        $response->assertJsonStructure([
            'statuses' => [
                [
                    'created_at',
                    'text',
                    'user' => [
                        'name',
                        'profile_image_url'
                    ]
                ]
            ]
        ]);
        // Check results were cached
        $this->assertTrue(Cache::has('tweets'));
    }
}
