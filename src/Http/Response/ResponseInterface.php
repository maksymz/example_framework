<?php
declare(strict_types=1);

namespace Http\Response;

interface ResponseInterface
{
    /**
     * @param mixed $body
     * @return void
     */
    public function setBody($body): void;

    /**
     * @return void
     */
    public function send(): void;
}
