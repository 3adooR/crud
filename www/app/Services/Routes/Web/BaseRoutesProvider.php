<?php

namespace App\Services\Routes\Web;

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

class BaseRoutesProvider
{
    public function registerRoutes(): void
    {
        Route::get('/', AppController::class)
            ->name(BaseRoutes::ROUTE_INDEX);
    }
}

