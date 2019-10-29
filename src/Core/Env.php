<?php
declare(strict_types=1);

namespace Core;

class Env
{
    /**
     * @var \Filesystem\FileHandler
     */
    private $fileHandler;

    /**
     * Env constructor.
     * @param \Filesystem\FileHandler $fileHandler
     */
    public function __construct(\Filesystem\FileHandler $fileHandler)
    {
        $this->fileHandler = $fileHandler;
    }

    /**
     * @return void
     */
    public function initEnvironment(): void
    {
        error_reporting(E_ALL & ~E_DEPRECATED);

        $generator = $this->fileHandler->readFile('./../.env');

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
