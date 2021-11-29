<?php

namespace Mathleite\Harmonisys\note;

class Note implements NoteInterface
{
    public function __construct(private string $noteName)
    {
        if (!$this->validate()) {
            throw new \InvalidArgumentException('Invalid note!');
        }
    }

    private function validate(): bool
    {
        return in_array(strtolower($this->noteName), $this->getAllValidNotes());
    }

    public function getName(): string
    {
        return ucfirst($this->noteName);
    }

    private function getAllValidNotes(): array
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