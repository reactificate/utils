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