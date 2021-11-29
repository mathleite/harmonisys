<?php

namespace Mathleite\Harmonisys\factory;

use Mathleite\Harmonisys\note\NoteInterface;
use Mathleite\Harmonisys\note\NoteService;
use Mathleite\Harmonisys\utils\Logger;

class ScaleFactory
{
    private const SCALE_FORMAT = 'ttsttts';

    public static function execute(NoteInterface $note)
    {
        $rootNoteIndex = array_search($note->getNoteName(), NoteService::getAllNotes());
        return self::buildScale($rootNoteIndex);
    }

    private static function buildScale(string $rootNote): array
    {
        $scaleFormatInArray = str_split(self::SCALE_FORMAT);
        $notes = NoteService::getAllNotes();
        $scaleStructure = [];

        foreach ($scaleFormatInArray as $index => $pattern) {
            if (count($scaleStructure) === $completeScaleLength = 7) {
                break;
            }

            if ($index === 0) {
                $scaleStructure[] = $notes[$rootNote];
            }

            $patternInScale = $pattern === 't'
                ? 2
                : 1;
            $lastNoteInScale = $scaleStructure[count($scaleStructure) - 1];
            $scaleLength = count($notes) - 1;

            if (key_exists(
                $nextToneNotePosition = (
                    ($lastNotePosition = array_search($lastNoteInScale, $notes)) + $patternInScale
                ),
                $notes
            )) {
                $scaleStructure[] = $notes[$nextToneNotePosition];
                continue;
            }

            $remainingNotes = $scaleLength - $lastNotePosition;

            if ($remainingNotes !== 0) {
                $scaleStructure[] = $notes[($remainingNotes - $patternInScale) * -1];
                continue;
            }

            $scaleStructure[] = $notes[$patternInScale - 1];
            Logger::info($scaleStructure, false);
        }
        return $scaleStructure;
    }
}