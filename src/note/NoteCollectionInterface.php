<?php

namespace Mathleite\Harmonisys\note;

interface NoteCollectionInterface
{
    public function get(int $key): ?Note;
    public function search(string $noteName): int|bool;
    public function count(): int;
    public function keyExists(int $key): bool;
    public function push(Note $note): void;
    public function toArray(): array;
}