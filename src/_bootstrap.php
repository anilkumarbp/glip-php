<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Glip\SDK\GlipClient;
use RingCentral\SDK\Http\ApiException;

date_default_timezone_set('UTC');

// Make all PHP errors to be thrown as Exceptions
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        return;
    }
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});


