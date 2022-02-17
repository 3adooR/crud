<?php

namespace App\Services\Clients\Repositories;

use App\Models\Client;
use Illuminate\Support\Facades\Cache;

class ClientsRepository
{
    /**
     * Получение списка всех клиентов
     * @return Client[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(): \Illuminate\Database\Eloquent\Collection|array
    {
        $clients = Cache::get('clients');
        if (empty($clients)) {
            $clients = $this->cache();
        }
        return $clients;
    }

    /**
     * Добавление клиента в БД
     * @param array $data
     * @return Client
     */
    public function create(array $data): Client
    {
        $client = Client::firstOrCreate($data);
        $this->cache();
        return $client;
    }

    /**
     * Удаление клиента из БД
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        $result = Client::destroy($id);
        $this->cache();
        return $result;
    }

    /**
     * Обновление данных клиента
     * @param int $id
     * @param array $data
     * @return Client
     */
    public function update(int $id, array $data): Client
    {
        $client = Client::findOrFail($id);
        $client->update($data);
        $this->cache();
        return $client;
    }

    /**
     * Получение всего списка клиентов и кеширование его
     * @return Client[]|\Illuminate\Database\Eloquent\Collection
     */
    public function cache(): \Illuminate\Database\Eloquent\Collection|array
    {
        $clients = Client::all();
        Cache::put('clients', $clients, env('CACHE_TTL'));
        return $clients;
    }
}
