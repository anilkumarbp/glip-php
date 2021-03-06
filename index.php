<?php

// Require the bootstrap.php file
require_once('./src/_bootstrap.php');
require('./src/GlipClient.php');

use Glip\SDK\GlipClient;
use RingCentral\SDK\Platform\Platform;

// Set the default timezone
date_default_timezone_set ('UTC');


// Parse the .env file
$dotenv = new Dotenv\Dotenv(getcwd());
$dotenv->load();


try  {

    // Create Glip Client
    $gc = new GlipClient([
        'server' => $_ENV['SERVER'], // https://platform.ringcentral.com for production or https://platform.devtest.ringcentral.com for sandbox
        'appKey' => $_ENV['APP_KEY'],
        'appSecret' => $_ENV['APP_SECRET'],
        'appName' => $_ENV['APP_NAME'],
        'appVersion' => $_ENV['APP_VERSION']
    ]);

    // Authorize using the credentials
    $gc->authorize([
        'username' => $_ENV['USERNAME'],
        'extension' => $_ENV['EXTENSION'],
        'password' => $_ENV['PASSWORD']
    ]);

    print PHP_EOL . 'Logged in : '. PHP_EOL . print_r(json_encode($gc->getToken(), JSON_PRETTY_PRINT));


    // Get the user Groups available in the account
    $posts = $gc->groups()->get();

    print 'The Group List is :' . print_r($posts->json());


    // Post a message by Group ID
    $postCreate = $gc->posts()->post([
        'text' => 'sample hi message from pawan2',
	    'groupId' => 3607527430
    ])->json();

    print 'The response for creating a post is :' . print_r($postCreate);

    // Get Messages by GroupId
    $messages = $gc->posts()->get([
        'groupId'=> $_ENV['GROUP']
    ])->json()->records;

    print 'The Messages by groupID is :' . print_r($messages);

    // Get Message by Id
    $messageById = $gc->posts()->get([
        'postId' => $_ENV['POST']
    ])->json()->records;

    print 'The Messages by ID is :' . print_r($messageById);

}

catch (Exception $e) {

    print 'Exception: ' . $e->getMessage() . PHP_EOL;

}


