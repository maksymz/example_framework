<?php
declare(strict_types=1);

namespace Core;

class View
{
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
        $block = new $blockClass;
        return $block->toHtml();
    }

    /**
     * @return string
     */
    public function renderContent(): string
    {
        $layout = new Layout();
        $layout->setContentBlock($this->contentBlockClass);
        return $layout->toHtml();
    }
}
