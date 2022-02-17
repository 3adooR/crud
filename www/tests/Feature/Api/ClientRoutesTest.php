<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use App\Models\User;
use App\Services\Routes\Api\Client\ClientRoutes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class ClientRoutesTest
 * @package Tests\Feature\Api
 * @group api
 * @group routes
 * @group clients
 */
class ClientRoutesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private User $user;
    private Client $client;
    private array $testClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make();
        $this->client = Client::factory()->create();
        $this->testClient = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }

    /** ROUTE_CLIENT_LIST **/
    public function testRouteClientListShouldReceivedStatus_200()
    {
        $response = $this->actingAs($this->user)
            ->getJson(route(ClientRoutes::ROUTE_CLIENT_LIST));
        $response->assertStatus(200);
    }

    public function testRouteClientListShouldReceivedParameterClientsCount_1ByDefault()
    {
        $response = $this->actingAs($this->user)
            ->getJson(route(ClientRoutes::ROUTE_CLIENT_LIST));
        $response->assertJsonPath('meta.clients_count', 1);
    }

    public function testRouteClientListShouldReceivedCorrectJsonStruct()
    {
        $response = $this->actingAs($this->user)
            ->getJson(route(ClientRoutes::ROUTE_CLIENT_LIST));
        $response->assertJsonStructure([
            'data',
            'meta' => ['clients_count']
        ]);
    }

    /** ROUTE_CLIENT_ADD **/
    public function testRouteClientAddShouldReceivedStatus_201WithTestData()
    {
        $response = $this->actingAs($this->user)
            ->putJson(route(ClientRoutes::ROUTE_CLIENT_ADD, $this->testClient));
        $response->assertStatus(201);
    }

    public function testRouteClientAddShouldReceivedStatus_400WithNoData()
    {
        $response = $this->actingAs($this->user)
            ->putJson(route(ClientRoutes::ROUTE_CLIENT_ADD));
        $response->assertStatus(400);
    }

    public function testRouteClientAddShouldReceivedJsonWithSuccessTrueWithTestData()
    {
        $response = $this->actingAs($this->user)
            ->putJson(route(ClientRoutes::ROUTE_CLIENT_ADD, $this->testClient));
        $response->assertJsonPath('success', true);
    }

    /** ROUTE_CLIENT_DEL **/
    public function testRouteClientDelShouldReceivedStatus_200()
    {
        $response = $this->actingAs($this->user)
            ->deleteJson(route(ClientRoutes::ROUTE_CLIENT_DEL, $this->client->id));
        $response->assertStatus(200);
    }

    public function testRouteClientDelShouldReceivedStatus_404ForUnknownId()
    {
        $response = $this->actingAs($this->user)
            ->deleteJson(route(ClientRoutes::ROUTE_CLIENT_DEL, 0));
        $response->assertStatus(404);
    }

    public function testRouteClientDelShouldReceivedJsonWithSuccessTrueWithTestData()
    {
        $response = $this->actingAs($this->user)
            ->deleteJson(route(ClientRoutes::ROUTE_CLIENT_DEL, $this->client->id));
        $response->assertJsonPath('success', true);
    }
}
