<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CustomerTest extends TestCase
{

    public function getBody(): array
    {
        return [
            'name' => 'jonh snow',
            'document' => '123123123',
        ];
    }


    /** @test */
    public function post_customer_with_body()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']);

        $this->post('/api/customers', $this->getBody())->assertCreated();

    }

    /** @test */
    public function post_customer_with_body_and_get_error_302()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']);

        $this->post('/api/customers', [])->assertStatus(302);
    }
}
