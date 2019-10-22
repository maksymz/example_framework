<?php
declare(strict_types=1);

namespace Core;

use Filesystem\FileHandler;

class Env
{
    /**
     * @return void
     */
    public function initEnvironment(): void
    {
        error_reporting(E_ALL & ~E_DEPRECATED);

        $fileHandler = new FileHandler();

        $generator = $fileHandler->readFile('./../.env');

        while ($line = $generator->current()) {
            putenv($line);
            $generator->next();
        }

        $mode = getenv('MODE');

        if ($mode === 'production') {
            ini_set('display_errors', 'Off');
        }
    }
}