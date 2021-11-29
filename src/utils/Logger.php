<?php

namespace Mathleite\Harmonisys\utils;

final class Logger
{
    public static function info(mixed $content, bool $appendLog = true): bool
    {
        if (!is_dir(__DIR__ . '/../../logs') && !mkdir(__DIR__ . '/../../logs')) {
            throw new \Exception('Fail to create logs folder!');
        }

        return file_put_contents(
            __DIR__ . '/../../logs/application.log',
            self::generateFormattedLog($content),
            !$appendLog ?: FILE_APPEND);
    }

    private static function generateFormattedLog(mixed $content): string
    {
        $formattedContent = $content;
        if (is_array($content)) {
            $formattedContent = json_encode($content);
        }

        $date = date('Y-m-d H:i:s');
        return "Date: $date" . PHP_EOL .
            "Log: $formattedContent" . PHP_EOL .
            "------------------------" . PHP_EOL;
    }
}