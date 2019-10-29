<?php
declare(strict_types=1);

namespace Core;

class DIContainer implements ContainerInterface
{
    private $services = [];

    public function __construct()
    {
        $this->services[\Core\DIContainer::class] = $this;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws \ReflectionException
     */
    public function get($id)
    {
        if (!isset($this->services[$id])) {
            $reflectionClass = new \ReflectionClass($id);

            if ($constructor = $reflectionClass->getConstructor()) {
                $constructorArguments = [];

                foreach ($constructor->getParameters() as $parameter) {
                    $type = $parameter->getType();
                    $constructorArguments[] = $this->get($type->getName());
                }

                $this->services[$id] = new $id(...$constructorArguments);
            } else {
                $this->services[$id] = new $id;
            }
        }

        return $this->services[$id];
    }

    public function has($id)
    {

    }
}
