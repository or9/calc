<?php

class Route extends TestCase {

	// Tests:
	// 	route->add delegates to controller@add
	// 	route->subtract delegates to controller@subtract
	// 	route->multiply delegates to controller@multiply
	// 	route->divide delegates to controller@divide

    /**
     * A basic test example.
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/');
        $this->assertResponseOk();
    }

}

