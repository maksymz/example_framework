<?php
declare(strict_types=1);

namespace View;

class View
{
    /**
     * @var \Core\DIContainer $container
     */
    private $container;

    /**
     * View constructor.
     * @param \Core\DIContainer $container
     */
    public function __construct(
        \Core\DIContainer $container
    ) {
        $this->container = $container;
    }

    /**
     * @var string
     */
    private $contentBlockClass;

    /**
     * @param string $className
     */
    public function setContentBlock(string $className)
    {
        $this->contentBlockClass = '\\' . $className;
    }

    /**
     * @param string $blockClass
     * @return string
     */
    public function render(string $blockClass): string
    {
        /** @var BlockInterface $block */
        $block = $this->container->get($blockClass);
        return $block->toHtml();
    }

    /**
     * @return string
     */
    public function renderContent(): string
    {
        $layout = $this->container->get(Layout::class);
        $layout->setContentBlock($this->contentBlockClass);
        return $layout->toHtml();
    }
}
