<?php

namespace Tests\Feature\Api;

use App\Http\Controllers\Api\V1\ApiController;
use Tests\TestCase;

/**
 * Class ApiControllerTest
 * @package Tests\Feature\Api
 * @group controllers
 * @group api
 */
class ApiControllerTest extends TestCase
{
    public function testApiControllerHasMethodErrNotFound()
    {
        $this->assertTrue(
            method_exists(ApiController::class, 'errNotFound'),
            'ApiController class does not have method errNotFound'
        );
    }
}
