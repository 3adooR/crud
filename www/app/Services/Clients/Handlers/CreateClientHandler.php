<?php

namespace App\Services\Clients\Handlers;

use App\Services\Clients\Repositories\ClientsRepository;
use App\Models\Client;

class CreateClientHandler
{
    private ClientsRepository $repository;

    public function __construct(ClientsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(array $data): Client
    {
        return $this->repository->create($data);
    }
}
