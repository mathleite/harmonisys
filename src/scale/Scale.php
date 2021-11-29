<?php

namespace Mathleite\Harmonisys\scale;

use Mathleite\Harmonisys\note\Note;
use Mathleite\Harmonisys\note\NoteCollection;

class Scale implements \Stringable
{
    private const DEGREE_INDEX_LIST = [0, 1, 2, 3, 4, 5, 6];

    private Note $firstDegree;
    private Note $secondDegree;
    private Note $thirdDegree;
    private Note $fourthDegree;
    private Note $fifthDegree;
    private Note $sixthDegree;
    private Note $seventhDegree;

    public function __construct(private NoteCollection $notes)
    {
        $this->buildDegrees();
    }

    private function buildDegrees(): void
    {
        foreach (self::DEGREE_INDEX_LIST as $degree) {
            $note = $this->notes->get($degree);
            if ($degree === 0) {
                $this->firstDegree = $note;
            }
            if (
                $degree === 1
                || $degree === 2
                || $degree === 5
            ) {
                $note->setIsMinor(true);
            }
            if ($degree === 1) {
                $this->secondDegree = $note;
            }
            if ($degree === 2) {
                $this->thirdDegree = $note;
            }
            if ($degree === 3) {
                $this->fourthDegree = $note;
            }
            if ($degree === 4) {
                $this->fifthDegree = $note;
            }
            if ($degree === 5) {
                $this->sixthDegree = $note;
            }
            if ($degree === 6) {
                $note->setIsTiny(true);
                $this->seventhDegree = $note;
            }
        }
    }

    public function __toString(): string
    {
        $degreesPhrase = "Degrees:\nI: {$this->firstDegree->getName()}\nII: {$this->secondDegree->getName()}\nIII: {$this->thirdDegree->getName()}\nIV: {$this->fourthDegree->getName()}\nV: {$this->fifthDegree->getName()}\nVI: {$this->sixthDegree->getName()}\nVII: {$this->seventhDegree->getName()}\n";
        return "Scale: {$this->firstDegree->getName()}" . PHP_EOL . $degreesPhrase;
    }
}