<?php

namespace App\Services\Clients;

use App\Services\Clients\Handlers\UpdateClientHandler;
use App\Services\Clients\Repositories\ClientsRepository;
use App\Services\Clients\Handlers\CreateClientHandler;
use App\Services\Clients\Handlers\DeleteClientHandler;
use App\Models\Client;

class ClientsService
{
    /** @var ClientsRepository * */
    private ClientsRepository $repository;

    /** @var CreateClientHandler * */
    private CreateClientHandler $createHandler;

    /** @var DeleteClientHandler * */
    private DeleteClientHandler $deleteHandler;

    /** @var UpdateClientHandler */
    private UpdateClientHandler $updateHandler;

    /**
     * ClientsService constructor.
     * @param ClientsRepository $repository
     * @param CreateClientHandler $createHandler
     * @param DeleteClientHandler $deleteHandler
     * @param UpdateClientHandler $updateHandler
     */
    public function __construct(
        ClientsRepository $repository,
        CreateClientHandler $createHandler,
        DeleteClientHandler $deleteHandler,
        UpdateClientHandler $updateHandler
    )
    {
        $this->repository = $repository;
        $this->createHandler = $createHandler;
        $this->deleteHandler = $deleteHandler;
        $this->updateHandler = $updateHandler;
    }

    /**
     * Get ALL clients
     * @return Client[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->repository->get();
    }

    /**
     * Add new client
     * @param array $data
     * @return Client
     */
    public function create(array $data): Client
    {
        return $this->createHandler->handle($data);
    }

    /**
     * Delete client by ID
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->deleteHandler->handle($id);
    }

    /**
     * Update client by ID
     * @param int $id
     * @param array $data
     * @return Client
     */
    public function update(int $id, array $data): Client
    {
        return $this->updateHandler->handle($id, $data);
    }
}
