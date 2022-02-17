<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\ClientAddRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Resources\Clients\ClientsCollection;
use App\Services\Clients\ClientsService;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClientsController extends ApiController
{
    /**
     * Clients list
     * @return ClientsCollection
     */
    public function list(): ClientsCollection
    {
        return new ClientsCollection(Client::all());
    }

    /**
     * Add new client
     * @param ClientAddRequest $request
     * @param ClientsService $clientsService
     * @return JsonResponse
     */
    public function store(ClientAddRequest $request, ClientsService $clientsService): JsonResponse
    {
        $response = ['success' => true];
        if (!$clientsService->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone')
        ])) {
            $response['success'] = false;
        }
        $status = ($response['success']) ? 201 : 409;
        return response()->json($response, $status);
    }

    /**
     * Delete client
     * @param ClientsService $clientsService
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(ClientsService $clientsService, int $id): JsonResponse
    {
        if (!$clientsService->delete($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Can not find client with ID = ' . $id
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Client deleted'
        ]);
    }

    /**
     * Update client
     * @param ClientUpdateRequest $request
     * @param ClientsService $clientsService
     * @param int $id
     * @return JsonResponse
     */
    public function update(ClientUpdateRequest $request, ClientsService $clientsService, int $id): JsonResponse
    {
        if (!$clientsService->update($id, [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone')
        ])) {
            return response()->json([
                'success' => false,
                'message' => 'Can not find client with ID = ' . $id
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Client updated'
        ]);
    }

}
