<?php

require_once __DIR__ . '/../bootstrap/index.php';

$result = \Mathleite\Harmonisys\factory\ScaleFactory::execute(
    new \Mathleite\Harmonisys\note\Note('A')
);

echo json_encode($result) . PHP_EOL;