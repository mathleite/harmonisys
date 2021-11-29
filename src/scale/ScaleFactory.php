<?php

namespace Mathleite\Harmonisys\scale;

use Mathleite\Harmonisys\note\NoteCollection;
use Mathleite\Harmonisys\note\NoteInterface;
use Mathleite\Harmonisys\note\NoteService;
use Mathleite\Harmonisys\utils\Logger;

class ScaleFactory
{
    private const SCALE_FORMAT = 'ttsttts';

    public static function execute(NoteInterface $note): Scale
    {
        $noteCollection = NoteService::getAllNotes();
        $rootNoteIndex = $noteCollection->search($note->getName());
        return self::buildScale($rootNoteIndex, $noteCollection);
    }

    private static function buildScale(string $rootNote, NoteCollection $collection): Scale
    {
        $scaleFormatInArray = str_split(self::SCALE_FORMAT);
        $scaleNotesCollection = new NoteCollection();

        foreach ($scaleFormatInArray as $index => $pattern) {
            if ($scaleNotesCollection->count() === $completeScaleLength = 7) {
                break;
            }

            if ($index === 0) {
                $scaleNotesCollection->push($collection->get($rootNote));
            }

            $patternInScale = $pattern === 't'
                ? 2
                : 1;
            $lastNoteInScale = $scaleNotesCollection->get($scaleNotesCollection->count() - 1);

            $scaleLength = $collection->count() - 1;

            if ($collection->keyExists(
                $nextToneNotePosition = (
                    ($lastNotePosition = $collection->search($lastNoteInScale->getName())) + $patternInScale
                )
            )) {
                $scaleNotesCollection->push($collection->get($nextToneNotePosition));
                continue;
            }

            $remainingNotes = $scaleLength - $lastNotePosition;

            if ($remainingNotes !== 0) {
                $scaleNotesCollection->push($collection->get(($remainingNotes - $patternInScale) * -1));
                continue;
            }

            $scaleNotesCollection->push($collection->get($patternInScale - 1));
        }

        Logger::info($scaleNotesCollection->toArray(), true);
        return new Scale($scaleNotesCollection);
    }
}