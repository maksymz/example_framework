<?php
declare(strict_types=1);

namespace Cms\Block;

use View\AbstractBlock;

class Home extends AbstractBlock
{
    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return './../templates/cms/home.phtml';
    }
}
