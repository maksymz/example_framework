<?php
declare(strict_types=1);

namespace ContactUs\Controller;

use ContactUs\Block\ContactForm;
use Http\Response\Factory;
use Http\Response\PageResponse;
use Http\Response\ResponseInterface;

class ContactUs extends \Http\AbstractController
{
    public function execute(): ResponseInterface
    {
        /** @var PageResponse $response */
        $response = $this->responseFactory->get(Factory::RESPONSE_TYPE_PAGE);
        $response->setBody(ContactForm ::class);

        return $response;
    }
}
