<?php

$app->get("/", ["as" => "index", "uses" => "App\Http\Controllers\Controller@index"]);

$app->group(["prefix" => "/api"], function ($app) {
	$app->post("/add", ["uses" => "App\Http\Controllers\Api@add"]);
	$app->post("/subtract", ["uses" => "App\Http\Controllers\Api@subtract"]);
	$app->post("/multiply", ["uses" => "App\Http\Controllers\Api@multiply"]);
	$app->post("/divide", ["uses" => "App\Http\Controllers\Api@divide"]);
	$app->post("/clear", ["uses" => "App\Http\Controllers\Api@clear"]);
});
