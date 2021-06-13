<?php

namespace Tests\Feature;

use App\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testArtisanMock()
    {
        Artisan::shouldReceive('call')
            ->once()
            ->with('shifts:now');

        $response = $this->get('/artisan');
        $response->assertOk();
    }
}
