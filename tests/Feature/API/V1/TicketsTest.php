<?php

namespace Tests\Feature\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketsTest extends TestCase
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

    public function test_create_new_ticket() {

    $response = $this->withHeaders([
        'Accept' => 'application/json',
        ])->post('/api/v1/tickets', [
            'customer_name' => 'Jasper Jorden',
            'email' => 'jasper@gmail.com',
            'phone' => '+112233445566',
            'description' => 'There is something wrong with my computer',
        ]);

    $response->assertStatus(200);
    $response->assertJson([
        'data' => [
            'email' => 'jasper@gmail.com',
        ]
     ]);
    }

//     public function test_get_all_tickets_without_factory()
// {
//     // Arrange: Manually create tickets
//     \App\Models\Ticket::create([
//         'customer_name' => 'John Doe',
//         'email' => 'john@example.com',
//         'phone' => '+1111111111',
//         'description' => 'My screen is broken',
//     ]);

//     \App\Models\Ticket::create([
//         'customer_name' => 'Jane Smith',
//         'email' => 'jane@example.com',
//         'phone' => '+2222222222',
//         'description' => 'Battery not charging',
//     ]);

//     // Act: Call the GET endpoint
//     $response = $this->withHeaders([
//         'Accept' => 'application/json',
//     ])->get('/api/v1/tickets');

//     // Assert: Check status and presence of one known email
//     $response->assertStatus(200);
//     $response->assertJsonFragment([
//         'email' => 'john@example.com',
//     ]);
// }


}


