<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeaturesTest extends TestCase
{
    /** @test */
    
    
    public function should_return_ok_or_200_when_fratures_link_clicked()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/features');

        $response->assertOk();
        $response->assertStatus(200);
        
    }
}
