<?php

$app->get("/", ["as" => "index", "uses" => "App\Http\Controllers\Calculator@index"]);
