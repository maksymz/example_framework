<?php
declare(strict_types=1);

namespace Core;

class Autoload
{
    /**
     * @param string $className
     * @return void
     */
    public function load(string $className): void
    {
        $filePath = './../src/'
            . str_replace('\\', DIRECTORY_SEPARATOR, $className)
            . '.php';

        if (!file_exists($filePath)) {
            throw new \RuntimeException("File $filePath does not exist");
        }

        require_once $filePath;

        if (!class_exists($className) && !interface_exists($className)) {
            throw new \RuntimeException("Class $className not found in file $filePath");
        }
    }
}
