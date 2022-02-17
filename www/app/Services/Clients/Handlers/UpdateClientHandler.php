<?php

namespace App\Services\Clients\Handlers;

use App\Models\Client;
use App\Services\Clients\Repositories\ClientsRepository;

class UpdateClientHandler
{
    private ClientsRepository $repository;

    public function __construct(ClientsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(int $id, array $data): Client
    {
        return $this->repository->update($id, $data);
    }
}
