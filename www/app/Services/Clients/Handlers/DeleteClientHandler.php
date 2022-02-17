<?php

namespace App\Services\Clients\Handlers;

use App\Services\Clients\Repositories\ClientsRepository;

class DeleteClientHandler
{
    private ClientsRepository $repository;

    public function __construct(ClientsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id): int
    {
        return $this->repository->delete($id);
    }
}
