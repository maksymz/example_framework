<?php
declare(strict_types=1);

namespace Cms\Controller;

use Http\AbstractController;
use Http\Response\Factory;
use Http\Response\PageResponse;
use Http\Response\ResponseInterface;

class Home extends AbstractController
{
    public function execute(): ResponseInterface
    {
        /** @var PageResponse $response */
        $response = $this->responseFactory->get(Factory::RESPONSE_TYPE_PAGE);
        $response->setBody(\Cms\Block\Home::class);

        return $response;
    }
}
