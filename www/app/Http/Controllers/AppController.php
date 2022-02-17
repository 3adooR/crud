<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $this->info();
        return view('layouts.home');
    }

    /**
     * Вывод информацию в консоль о версии PHP и драйвере сессий
     */
    private function info(): void
    {
        $this->debug('Laravel: v'.Application::VERSION);
        $this->debug('PHP: v' . phpversion());
        $this->debug('session driver ' . env('SESSION_DRIVER'));
    }
}
