<?php

namespace Mathleite\Harmonisys\note;

interface NoteCollectionInterface
{
    public function get(int $key): ?Note;

    public function count(): int;
}