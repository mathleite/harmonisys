<?php

namespace Mathleite\Harmonisys\factory;

use Mathleite\Harmonisys\note\NoteCollection;
use Mathleite\Harmonisys\note\NoteInterface;
use Mathleite\Harmonisys\note\NoteService;
use Mathleite\Harmonisys\utils\Logger;

class ScaleFactory
{
    private const SCALE_FORMAT = 'ttsttts';

    public static function execute(NoteInterface $note)
    {
        $noteCollection = NoteService::getAllNotes();
        $rootNoteIndex = $noteCollection->search($note->getName());
        return self::buildScale($rootNoteIndex, $noteCollection);
    }

    private static function buildScale(string $rootNote, NoteCollection $collection): array
    {
        $scaleFormatInArray = str_split(self::SCALE_FORMAT);
        $scaleStructure = [];

        foreach ($scaleFormatInArray as $index => $pattern) {
            if (count($scaleStructure) === $completeScaleLength = 7) {
                break;
            }

            if ($index === 0) {
                $scaleStructure[] = $collection->get($rootNote);
            }

            $patternInScale = $pattern === 't'
                ? 2
                : 1;
            $lastNoteInScale = $scaleStructure[count($scaleStructure) - 1];

            $scaleLength = $collection->count() - 1;

            if ($collection->keyExists(
                $nextToneNotePosition = (
                    ($lastNotePosition = $collection->search($lastNoteInScale->getName())) + $patternInScale
                )
            )) {
                $scaleStructure[] = $collection->get($nextToneNotePosition);
                continue;
            }

            $remainingNotes = $scaleLength - $lastNotePosition;

            if ($remainingNotes !== 0) {
                $scaleStructure[] = $collection->get(($remainingNotes - $patternInScale) * -1);
                continue;
            }

            $scaleStructure[] = $collection->get($patternInScale - 1);
            Logger::info($scaleStructure, true);
        }
        return $scaleStructure;
    }
}