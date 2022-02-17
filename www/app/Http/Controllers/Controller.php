<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Вывод отладочной информации в DebugBar
     * @param $var
     * @param string $type
     */
    public static function debug($var, string $type = 'info')
    {
        switch ($type) {
            case 'error':
                Debugbar::error($var);
                break;
            case 'warning':
                Debugbar::warning($var);
                break;
            default:
                Debugbar::info($var);
        }
    }

}
