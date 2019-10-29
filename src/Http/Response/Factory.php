<?php
declare(strict_types=1);

namespace Http\Response;

class Factory
{
    const RESPONSE_TYPE_HTML = HtmlResponse::class;

    const RESPONSE_TYPE_PAGE = PageResponse::class;

    /**
     * @var \Core\DIContainer
     */
    private $container;

    /**
     * Factory constructor.
     * @param \Core\DIContainer $container
     */
    public function __construct(
        \Core\DIContainer $container
    ) {
        $this->container = $container;
    }

    /**
     * @param string $responseType
     * @return ResponseInterface
     * @throws \ReflectionException
     */
    public function get(string $responseType): ResponseInterface
    {
        switch ($responseType) {
            case self::RESPONSE_TYPE_HTML:
                $response = $this->container->get($responseType);
                break;
            case self::RESPONSE_TYPE_PAGE:
                $response = $this->container->get($responseType);
                break;
            default:
                throw new \DomainException("Response type $responseType is not supported!");
        }

        return $response;
    }
}
