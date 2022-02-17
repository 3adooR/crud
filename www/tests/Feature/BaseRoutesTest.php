<?php

namespace Tests\Feature;

use App\Services\Routes\Web\BaseRoutes;
use Tests\TestCase;

/**
 * Class BaseRoutesTest
 * @package Tests\Feature
 * @group routes
 * @group app
 */
class BaseRoutesTest extends TestCase
{
    /** HAS ROUTES **/
    public function testBaseRoutesHasRouteIndex()
    {
        $this->assertNotEmpty(
            BaseRoutes::ROUTE_INDEX,
            'BaseRoutes has not got ROUTE_INDEX'
        );
    }

    /** ROUTES HAS CORRECT VALUE **/
    public function testBaseRoutesRouteIndexIsIndex()
    {
        $this->assertEquals(
            'index',
            BaseRoutes::ROUTE_INDEX,
            'BaseRoutes ROUTE_INDEX value is not index'
        );
    }

    /** ROUTES RETURNS **/
    public function testBaseRoutesRouteIndexReturnSuccessful()
    {
        $response = $this->get(route(BaseRoutes::ROUTE_INDEX));
        $response->assertSuccessful();
    }

    public function testBaseRoutesRouteIndexGetReturn_200()
    {
        $response = $this->get(route(BaseRoutes::ROUTE_INDEX));
        $response->assertStatus(200);
    }
}
