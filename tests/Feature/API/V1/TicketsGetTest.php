<?php

namespace Tests\Feature\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketsGetTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_get_all_tickets() {

        $response = $this->getJson('/api/v1/tickets');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => []
                ]);
    }

    public function test_get_ticket_by_reference() {

        $ticket = \App\Models\Ticket::factory()->create(); // Create a fake ticket using factory

        $response = $this->getJson('/api/v1/tickets?ref=' . $ticket->ref);

        $response->assertStatus(200)
                ->assertJsonFragment(['ref' => $ticket->ref]);
    }

}
