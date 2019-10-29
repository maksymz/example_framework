<?php
declare(strict_types=1);

namespace Http;

use Core\DIContainer;

class RouterPool
{
    /**
     * @var array $routers
     */
    private $routers = [];

    /**
     * @var DIContainer
     */
    private $container;

    /**
     * RouterPool constructor.
     * @param DIContainer $container
     * @param \Catalog\Router $catalogRouter
     * @param \Cms\Router $cmsRouter
     * @param \ContactUs\Router $contactUsRouter
     */
    public function __construct(
        \Core\DIContainer $container,
        \Catalog\Router $catalogRouter,
        \Cms\Router $cmsRouter,
        \ContactUs\Router $contactUsRouter
    ) {
        $this->routers[] = $catalogRouter;
        $this->routers[] = $contactUsRouter;
        $this->routers[] = $cmsRouter;
        $this->container = $container;
    }

    public function resolve()
    {
        /** @var RouterInterface $router */
        foreach ($this->routers as $router) {
            if ($controller = $router->match($_SERVER['REQUEST_URI'])) {
                /** @var ControllerInterface $controllerInstance */
                $controllerInstance = $this->container->get($controller);

                if (!$controllerInstance instanceof ControllerInterface) {
                    throw new \DomainException('Controller must implement ControllerInterface!');
                }

                $response = $controllerInstance->execute();
                break;
            }
        }

        if (!isset($response)) {
            // @TODO: redirect to 404 page
        }

        $response->send();
    }
}
