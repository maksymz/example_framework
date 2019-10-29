<?php
declare(strict_types=1);

namespace Catalog\Block;

use Catalog\Repository\Product as ProductRepository;

class ProductList extends \View\AbstractBlock
{
    /**
     * @var \Catalog\Repository\Product
     */
    private $productRepository;

    /**
     * ProductList constructor.
     * @param \View\View $view
     * @param \Catalog\Repository\Product $productRepository
     */
    public function __construct(
        \View\View $view,
        \Catalog\Repository\Product $productRepository
    ) {
        parent::__construct($view);
        $this->productRepository = $productRepository;
    }

    /**
     * @return ProductRepository
     */
    public function getProducts(): ProductRepository
    {
        return $this->productRepository;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return './../templates/catalog/product/list.phtml';
    }
}
