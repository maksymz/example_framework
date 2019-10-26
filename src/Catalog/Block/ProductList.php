<?php
declare(strict_types=1);

namespace Catalog\Block;

use Catalog\Repository\Product;
use Core\AbstractBlock;

class ProductList extends AbstractBlock
{
    /**
     * @return Product
     */
    public function getProducts(): Product
    {
        return new Product();
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return './../templates/catalog/product/list.phtml';
    }
}
