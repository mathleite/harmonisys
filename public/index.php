<?php

require_once __DIR__ . '/../bootstrap/index.php';

$scale = \Mathleite\Harmonisys\scale\ScaleFactory::execute(
    (new \Mathleite\Harmonisys\note\Note('A'))
        ->setIsTiny(false)
        ->setIsMinor(false)
);

echo $scale;
