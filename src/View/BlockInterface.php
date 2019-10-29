<?php
declare(strict_types=1);

namespace View;

interface BlockInterface
{
    /**
     * @return string
     */
    public function toHtml(): string;

    /**
     * @param string $className
     * @return string
     */
    public function render(string $className): string;
}
