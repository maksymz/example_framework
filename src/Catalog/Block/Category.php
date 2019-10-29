<?php
declare(strict_types=1);

namespace Catalog\Block;

use View\AbstractBlock;

class Category extends AbstractBlock
{
    /**
     * @TODO: implement categories
     * @return string
     */
    public function getCategoryName(): string
    {
        return 'Mobile Phones';
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return './../templates/catalog/category.phtml';
    }
}
