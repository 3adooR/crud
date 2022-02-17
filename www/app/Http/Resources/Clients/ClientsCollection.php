<?php

namespace App\Http\Resources\Clients;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientsCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'clients_count' => $this->collection->count()
            ],
        ];
    }
}
