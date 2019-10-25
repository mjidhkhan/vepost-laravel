<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutTest extends TestCase
{
    
    /** @test */
   public function should_return_ok_or_200_when_about_link_clicked()
   {
       $this->withoutExceptionHandling();
       $response = $this->get('/about');

        $response->assertOk();
       $response->assertStatus(200);
       
   }
}
