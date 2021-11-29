<?php

require_once __DIR__ . '/../bootstrap/index.php';

$notes = \Mathleite\Harmonisys\factory\ScaleFactory::execute(
    new \Mathleite\Harmonisys\note\Note('A')
);

foreach ($notes as $note) {
    echo $note->getName() . PHP_EOL;
}
