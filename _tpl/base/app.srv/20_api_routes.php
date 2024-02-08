<?php
namespace App;



use Brace\Auth\Basic\BasicAuthToken;
use Brace\Auth\Basic\RequireValidAuthTokenMiddleware;
use Brace\Auth\Basic\SimpleBasicAuthMiddleware;
use Brace\Core\AppLoader;
use Brace\Core\BraceApp;
use Brace\Router\Type\RouteParams;
use App\Ctrl\DemoCtrl;

AppLoader::extend(function (BraceApp $app) {

    $mount = CONF_API_MOUNT;

    // Controller classes



    $basicAuthValidator = new SimpleBasicAuthMiddleware(function (BasicAuthToken $authToken) {
        // Allow User test with password test
        return validate_auth($authToken->user ?? "", $authToken->passwd ?? "", 'user:$6$FFpbhoguQfBGm3Jz$TuXbT0OhWNAUqyMCUDB1tkBrgWaQEXgxBWCsElAniT7Oju9Hi6rtsutadzUE/tS75j7eqtGJGAeGZwnVIOkbh0');
    });


    // Validate auth token from mailbox of subscription
    $app->router->registerClass($mount, DemoCtrl::class, [$basicAuthValidator]);

    // Return the Api Version
    $app->router->on("GET@$mount", function() {
        return ["system" => "ready", "status" => "ok"];
    });

    // Redirect to static Middleware (Frontend)
    $app->router->on("GET@/", function () use ($app) {
        return $app->redirect("/static");
    });


});
