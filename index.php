<?php

declare(strict_types=1);

namespace App;

require_once("src/Controller.php");
require_once("src/Request.php");

$configuration = require_once("config/config.php");

$request = new Request($_GET, $_POST);

Controller::initConfiguration($configuration);
(new Controller($request))->run();