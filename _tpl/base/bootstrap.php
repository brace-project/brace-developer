<?php

use Brace\Core\AppLoader;
// This file is included to autoloader by composer.json

require __DIR__ . "/config.php";
AppLoader::SetAppRoot(__DIR__ . "/app.srv");
