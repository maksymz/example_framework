<?php
declare(strict_types=1);

namespace Http;

interface RouterInterface
{
    /**
     * @param string $url
     * @return null|string
     */
    public function match(string $url): ?string;
}
