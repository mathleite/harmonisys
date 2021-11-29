<?php

namespace Mathleite\Harmonisys\note;

class NoteCollection implements \Iterator, NoteCollectionInterface
{
    private int $index = 0;

    /**
     * @param Note[]|array $notes
     */
    public function __construct(private array $notes = [])
    {
    }

    public function current(): Note
    {
        return $this->notes[$this->index];
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return array_key_exists($this->index, $this->notes);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }

    public function search(string $noteName): int|bool
    {
        foreach ($this->notes as $key => $note) {
            if (strtolower($noteName) !== strtolower($note->getName())) {
                continue;
            }
            return $key;
        }
        return false;
    }

    public function get(int $key): ?Note
    {
        if (!$this->keyExists($key)) {
            return null;
        }
        return $this->notes[$key];
    }

    public function count(): int
    {
        return count($this->notes);
    }

    public function keyExists(int $key): bool
    {
        return key_exists($key, $this->notes);
    }

    public function push(Note $note): void
    {
        array_push($this->notes, $note);
    }

    public function toArray(): array
    {
        return iterator_to_array($this);
    }
}