<?php
declare(strict_types=1);

namespace View;

abstract class AbstractBlock implements BlockInterface
{
    /**
     * @var View $view
     */
    protected $view;

    /**
     * AbstractBlock constructor.
     * @param View $view
     */
    public function __construct(\View\View $view)
    {
        $this->view = $view;
    }

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
        return $this->view->render($className);
    }

    /**
     * @return string
     */
    abstract protected function getTemplate(): string;
}
