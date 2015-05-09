<?php

class RouteTest extends TestCase {

	// Tests:
	//	index route has add, subtract, multiply, divide
	// 	route->add delegates to controller@add
	// 	route->subtract delegates to controller@subtract
	// 	route->multiply delegates to controller@multiply
	// 	route->divide delegates to controller@divide

    /**
     * Test index route
     * @return void
     */
    public function testIndex()
    {
        $response = $this->call('GET', '/');
        $this->assertResponseOk();
	$this->assertViewHas("calculation", 0);

    }

}

