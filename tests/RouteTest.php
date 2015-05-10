<?php namespace App\Http;

class RouteTest extends \TestCase {

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

    public function testAddRoute ()
    {
	$response = $this->call("POST", "/api/add", [ "value" =>"256" ]);
	$this->assertResponseOk();

	$data = json_decode($response->getContent(), true);
	$this->assertEquals(["value" => "256"], $data);
    }

    public function testSubtractRoute ()
    {
	$response = $this->call("POST", "/api/subtract", [ "value" => "123" ]);
	$this->assertResponseOk();

	$data = json_decode($response->getContent(), true);
	$this->assertEquals(["value" => "-123"], $data);

    }

    public function testMultiplyRoute ()
    {
	$this->call("POST", "/api/add", [ "value" => "4" ]);
	$response = $this->call("POST", "/api/multiply", [ "value" => "15" ]);
	$this->assertResponseOk();

	$data = json_decode($response->getContent(), true);
	$this->assertEquals(["value" => "60"], $data);
    }

    public function testDivideRoute ()
    {
	$this->call("POST", "/api/add", [ "value" => "1" ]);
	$response = $this->call("POST", "/api/divide", [ "value" => "2" ]);
	$this->assertResponseOk();

	$data = json_decode($response->getContent(), true);
	$this->assertEquals(["value" => "0.5"], $data);
    }
}

