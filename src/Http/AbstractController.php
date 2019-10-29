<?php
declare(strict_types=1);

namespace Http;

abstract class AbstractController implements ControllerInterface
{
    /**
     * @var Response\Factory $responseFactory
     */
    protected $responseFactory;

    /**
     * AbstractController constructor.
     * @param Response\Factory $responseFactory
     */
    public function __construct(\Http\Response\Factory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }
}
