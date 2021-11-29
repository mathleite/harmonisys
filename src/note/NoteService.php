<?php

namespace Mathleite\Harmonisys\note;

final class NoteService
{
    public static function getAllNotes(): NoteCollection
    {
        return new NoteCollection([
            new Note('c'),
            new Note('c#'),
            new Note('d'),
            new Note('d#'),
            new Note('e'),
            new Note('f'),
            new Note('f#'),
            new Note('g'),
            new Note('g#'),
            new Note('a'),
            new Note('a#'),
            new Note('b')
        ]);
    }
}