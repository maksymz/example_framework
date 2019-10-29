<?php
declare(strict_types=1);

namespace Http;

use Http\Response\ResponseInterface;

interface ControllerInterface
{
    public function execute(): ResponseInterface;
}
