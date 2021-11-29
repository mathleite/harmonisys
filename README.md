# Harmonisys

Harmonisys is a `scale builder`, that based on a **note**, it returns all notes `belonging` to this *harmonic field*.

### Setup
This project use docker-compose to setup the application.

```shell
docker-compose up --build -d
```

Composer install
```shell
docker-compose exec php composer install
```
### Usage
 Modify *public/index.php* with a Note that you want to build a scale.

*Example*:
```php
<?php

require_once __DIR__ . '/../bootstrap/index.php';

$result = \Mathleite\Harmonisys\factory\ScaleFactory::execute(
    new \Mathleite\Harmonisys\note\Note('A')
);

echo json_encode($result) . PHP_EOL;
```

Run
```shell
docker-compose exec php php ./public/index.php
```
Output
```
["a","b","c#","d","e","f#","g#"]
```

See more on [Issue](https://github.com/mathleite/harmonisys/issues) to future updates.