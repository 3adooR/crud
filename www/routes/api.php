<?php

use App\Services\Routes\Api\Client\ClientRoutesProvider;

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

app(ClientRoutesProvider::class)->registerRoutes();
