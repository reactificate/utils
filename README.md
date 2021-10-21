# Reactificate Utils

```php
<?php

use React\EventLoop\Factory;
use Reactificate\Utils\Console;
use Reactificate\Utils\Loop;
use Reactificate\Utils\Utils;

require 'vendor/autoload.php';

Utils::init(Factory::create());

Loop::interval(0.5, function (){
    static $count = 1;
    Console::echo($count . PHP_EOL);
    $count++;
});

Loop::getLoop()->run();
```

Console output formatting
```php
use Reactificate\Utils\Console;

Console::write(uniqid());
Console::info(uniqid());
Console::comment(uniqid());
Console::dump([uniqid()]);
Console::echo(uniqid());
Console::error(uniqid());
Console::question(uniqid());
Console::writeln(uniqid());
```

Configuration
```php
use Reactificate\Utils\Utils;
use Reactificate\Utils\Config;

Utils::setConfigDirectory(__DIR__ . '/config/');

$config = Config::load('server.php')

/**
 * Supposing config/server.php contains
 * return [
    'address' => [
        'host' => '0.0.0.0',
        'port' => '8001'
    ]
  ]; 
 */

var_dump($config->get('address.host'));
var_dump($config->get('address.port'));
```