<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketsShowTest extends TestCase
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

    // public function test_show_single_ticket() {

    //         $ticket = Ticket::factory()->create();

    //         $response = $this->getJson('api/v1/tickets/{$ticket->id}');

    //         $response->assertStatus(200)
    //                  ->assertJsonStructure([
    //                     'data' => [
    //                         'id',
    //                         'customer_name',
    //                         'email',
    //                         'phone',
    //                         'description',
    //                         'ref',
    //                         'status',
    //                         'created_at',
    //                         'updated_at',
    //                         'comments'
    //                     ],
    //                     'message'
    //                 ]);
    // }

}
