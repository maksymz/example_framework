<?php
declare(strict_types=1);

namespace Filesystem;

class FileHandler
{
    public function readFile(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new \RuntimeException("File $fileName does not exist");
        }

        $fileHandle = fopen($fileName, 'rb');

        while ($string = fgets($fileHandle)) {
            yield trim($string);
        }

        fclose($fileHandle);
    }

    /**
     * @param string $fileName
     * @param string $content
     * @param bool $append
     */
    public function writeFile(string $fileName, string $content, bool $append = false)
    {

    }
}
