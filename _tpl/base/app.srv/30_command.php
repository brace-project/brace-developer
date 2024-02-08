<?php
namespace App;



use Brace\Command\CliValueArgument;
use Brace\Core\AppLoader;
use Brace\Core\BraceApp;


AppLoader::extend(function (BraceApp $app) {
    $app->command->addCommand("demo", function (BraceApp $app) {

    });

    $app->command->addCommand("analyze", function (DataAccessManager $dataAccessManager, LackOpenAiClient $openAiClient, SubscriptionManagerInterface $subscriptionManager, array $arguments = [], ) {




    }, "", [new CliValueArgument("--thread_id", "Thread ID to analyze")]);

});


