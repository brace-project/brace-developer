<?php
namespace App;

use App\BL\DataAccess\DataAccessManager;

use App\BL\DataAccess\Type\T_DM_Account_Mailbox;
use App\Connector\ImapConnection;
use App\Type\HignsConfig;
use Brace\Command\CommandModule;
use Brace\Core\AppLoader;
use Brace\Core\BraceApp;
use Brace\Dbg\BraceDbg;
use Brace\Mod\Request\Zend\BraceRequestLaminasModule;
use Brace\Router\RouterModule;
use Brace\Router\Type\RouteParams;
use Lack\Keystore\KeyStore;
use Lack\OpenAi\LackOpenAiClient;
use Lack\OpenAi\Logger\CliLogger;
use Lack\Subscription\Brace\SubscriptionClientModule;
use Lack\Subscription\Type\T_Subscription;
use Phore\Di\Container\Producer\DiService;
use Phore\Di\Container\Producer\DiValue;
use Phore\ObjectStore\ObjectStore;
use Phore\ObjectStore\ObjectStoreDriverFactory;
use Sentry\Severity;
use function Sentry\init;

// Setup the environment
BraceDbg::SetupEnvironment(true, ["192.168.178.20", "localhost", "localhost:5000"]);


AppLoader::extend(function () {
    $app = new BraceApp();

    // Use Laminas (ZendFramework) Request Handler
    $app->addModule(new BraceRequestLaminasModule());

    // Use the Uri-Based Routing
    $app->addModule(new RouterModule());
    $app->addModule(new CommandModule());


    // Define the app so it is also available in dependency-injection
    $app->define("app", new DiValue($app));


    return $app;
});
