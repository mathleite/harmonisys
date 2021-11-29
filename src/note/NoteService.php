<?php

namespace Mathleite\Harmonisys\note;

final class NoteService
{
    public static function getAllNotes(): NoteCollection
    {
        return new NoteCollection([
            (new Note('c'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('c#'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('d'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('d#'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('e'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('f'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('f#'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('g'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('g#'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('a'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('a#'))
                ->setIsMinor(false)
                ->setIsTiny(false),
            (new Note('b'))
                ->setIsMinor(false)
                ->setIsTiny(false)
        ]);
    }
}