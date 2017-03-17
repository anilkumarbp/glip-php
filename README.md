# glip-php
Sample Glip Implementation in PHP

- [posts](src/Posts.php)
    - send message
    - get message(s)
- [groups](src/Groups.php)
    - get group(s)/team(s)
- [persons](src/Persons.php)
    - get person
- [companies](src/Companies.php)
    - get company


## Requirements

- PHP 5.5+
- CURL extension
- MCrypt extension


## Installation



## Usage

Please check the [demo](src).

Here is a code snippet to help you to get started quickly:

```php
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


    // Send message to a Group by GroupID
    $posts = $gc->posts()->get([
        'groupId'=> $_ENV['GROUP'],
        'text' => 'sample test'
    ]);

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
```


## Login Glip to test

For sandbox, please login https://glip.devtest.ringcentral.com/

For production, please login https://app.glip.com/


## Contributions

Any reports of problems, comments or suggestions are most welcome.

Please report these on [glip-php's Issue Tracker in Github](https://github.com/anilkumarbp/glip-php/issues).

## License

RingCentral SDK is available under an MIT-style license. See [LICENSE.txt](LICENSE.txt) for details.

RingCentral SDK &copy; 2017 by RingCentral

## Todo

- setup WebHooks to receive real time notifications
   
