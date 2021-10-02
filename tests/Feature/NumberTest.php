<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class NumberTest extends TestCase
{
    public function getBody(): array
    {
        return [
            'number' => 'My number',
        ];
    }


    /** @test */
    public function post_number_without_body_return_created_because_is_not_required()
    {
        Sanctum::actingAs(
            $user = User::factory()->create(),
            ['*']);

        $customer = Customer::factory()->create(['user_id' => $user->id]);

        $this->post("/api/customers/{$customer->id}/numbers", [])->assertCreated();

    }

    /** @test */
    public function post_number_test_length_field()
    {
        Sanctum::actingAs(
            $user = User::factory()->create(),
            ['*']);

        $customer = Customer::factory()->create(['user_id' => $user->id]);

        $this->post("/api/customers/{$customer->id}/numbers", [
            'number' => '1231'
        ])->assertStatus(302);

    }

    /** @test */
    public function post_number_success()
    {
        Sanctum::actingAs(
            $user = User::factory()->create(),
            ['*']);

        $customer = Customer::factory()->create(['user_id' => $user->id]);

        $this->post("/api/customers/{$customer->id}/numbers", $this->getBody())->assertCreated();
    }
}
