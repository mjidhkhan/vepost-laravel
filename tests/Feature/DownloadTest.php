<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DownloadTest extends TestCase
{
    
    /** @test */
    public function should_return_ok_or_200_when_download_link_clicked()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/downloads');

        $response->assertOk();
        $response->assertStatus(200);
    }
    
}
