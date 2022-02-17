<?php

namespace App\Services\Routes\Api\Client;

use App\Http\Controllers\Api\V1\ClientsController;
use Illuminate\Support\Facades\Route;

class ClientRoutesProvider
{
    public function registerRoutes(): void
    {
        Route::group([
            'prefix' => 'v1',
            'middleware' => [
                //ApiAuth::class,
            ]
        ], function () {
            Route::get('/clients', [ClientsController::class, 'list'])
                ->name(ClientRoutes::ROUTE_CLIENT_LIST);

            Route::put('/clients/add', [ClientsController::class, 'store'])
                ->name(ClientRoutes::ROUTE_CLIENT_ADD);

            Route::delete('/clients/{id}/del', [ClientsController::class, 'destroy'])
                ->name(ClientRoutes::ROUTE_CLIENT_DEL);

            Route::patch('/clients/{id}/update', [ClientsController::class, 'update'])
                ->name(ClientRoutes::ROUTE_CLIENT_UPDATE);
        });
    }
}
