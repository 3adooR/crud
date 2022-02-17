<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::get('id');
        if ($clients->isEmpty()) {
            Client::factory()
                ->count(10)
                ->create();
        }
    }
}
