<?php
declare(strict_types=1);

namespace ContactUs;

use ContactUs\Controller\ContactUs;

class Router implements \Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $url): ?string
    {
        if (stripos($url, '/contact-us') === 0) {
            return ContactUs::class;
        }

        return null;
    }
}
