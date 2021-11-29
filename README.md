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

$notes = \Mathleite\Harmonisys\factory\ScaleFactory::execute(
    new \Mathleite\Harmonisys\note\Note('A')
);

foreach ($notes as $note) {
    echo $note->getName() . PHP_EOL;
}

```

Run
```shell
docker-compose exec php php ./public/index.php
```
Output
```
A
B
C#
D
E
F#
G#
```

See more on [Issue](https://github.com/mathleite/harmonisys/issues) to future updates.