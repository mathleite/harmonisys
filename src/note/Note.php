<?php

namespace Mathleite\Harmonisys\note;

class Note implements NoteInterface
{
    public function __construct(private string $noteName)
    {
        $this->noteName = strtolower($this->noteName);
        if (!$this->validate()) {
            throw new \InvalidArgumentException('Invalid note!');
        }
    }

    private function validate(): bool
    {
        return in_array($this->noteName, NoteService::getAllNotes());
    }

    public function getNoteName(): string
    {
        return $this->noteName;
    }
}