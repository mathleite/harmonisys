<?php

namespace Mathleite\Harmonisys\note;

final class NoteService
{
    public static function getAllNotes(): array
    {
        return [
            'c',
            'c#',
            'd',
            'd#',
            'e',
            'f',
            'f#',
            'g',
            'g#',
            'a',
            'a#',
            'b'
        ];
    }
}