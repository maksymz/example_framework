<?php
declare(strict_types=1);

namespace Core;

abstract class AbstractBlock implements BlockInterface
{
    /**
     * @inheritDoc
     */
    public function toHtml(): string
    {
        ob_start();
        require $this->getTemplate();
        return ob_get_clean();
    }

    /**
     * @param string $className
     * @return string
     */
    public function render(string $className): string
    {
        $view = new View();
        return $view->render($className);
    }

    /**
     * @return string
     */
    abstract protected function getTemplate(): string;
}
