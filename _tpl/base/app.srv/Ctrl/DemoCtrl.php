<?php

namespace App\Ctrl;
use Brace\Router\Attributes\BraceRoute;
use Brace\Router\Type\RouteParams;

class DemoCtrl
{

     #[BraceRoute("GET@/{name}/info", "demo.info")]
    public function getAccountConfig(RouteParams $routeParams) {

        return ["data" => "Hello " . $routeParams->name];
    }

}
