<?php
declare(strict_types=1);

namespace Cms;

use Cms\Controller\Home;

class Router implements \Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $url): ?string
    {
        if (stripos($url, '/') === 0 || !$url) {
            return Home::class;
        }

        return null;
    }
}
