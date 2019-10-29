<?php
declare(strict_types=1);

namespace View;

class Layout extends AbstractBlock
{
    /**
     * @var string
     */
    private $contentBlockClass;

    /**
     * @return string
     */
    public function renderContent(): string
    {
        return $this->view->render($this->contentBlockClass);
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return './../templates/template.phtml';
    }

    /**
     * @return array
     */
    public function getMenuItems() : array
    {
        return [
            '/' => 'Home',
            '/shop' => 'Shop',
            '/blog' => 'Blog',
            '/contact-us' => 'Contact Us'
        ];
    }

    /**
     * @param string $className
     */
    public function setContentBlock(string $className)
    {
        $this->contentBlockClass = $className;
    }
}
