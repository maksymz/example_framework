<?php
declare(strict_types=1);

namespace Http\Response;

class PageResponse extends AbstractResponse
{
    /**
     * @var \View\View
     */
    private $view;

    /**
     * @var string $contentBlock
     */
    private $contentBlock = '';

    /**
     * PageResponse constructor.
     * @param \View\View $view
     */
    public function __construct(\View\View $view)
    {
        $this->view = $view;
    }

    /**
     * @inheritDoc
     */
    public function setBody($contentBlockClass): void
    {
        $this->contentBlock = $contentBlockClass;
    }

    /**
     * @return void
     */
    public function send(): void
    {
        $this->view->setContentBlock($this->contentBlock);
        $html = $this->view->renderContent();

        header('Content-Type: text/html;');
        echo $html;
    }
}
