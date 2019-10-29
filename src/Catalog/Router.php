<?php
declare(strict_types=1);

namespace Catalog;

use Catalog\Controller\Category;

class Router implements \Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $url): ?string
    {
        if (stripos($url, '/shop') === 0) {
            return Category::class;
        }

        return null;
    }
}
