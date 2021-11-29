<?php

namespace Mathleite\Harmonisys\note;

class Note implements NoteInterface, \Stringable
{
    private bool $isMinor = false;
    private bool $isTiny = false;

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
        $name = ucfirst($this->noteName);
        if ($this->isMinor) {
            return "{$name}m";
        }
        if ($this->isTiny) {
            return "{$name}dim";
        }
        return $name;
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

    public function __toString()
    {
        return $this->getName() . PHP_EOL;
    }

    public function setIsMinor(bool $isMinor): self
    {
        $this->isMinor = $isMinor;
        return $this;
    }

    public function setIsTiny(bool $isTiny): self
    {
        $this->isTiny = $isTiny;
        return $this;
    }
}