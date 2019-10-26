<?php
declare(strict_types=1);

namespace Catalog\Repository;

class Product implements \IteratorAggregate
{
    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->getProductList());
    }

    /**
     * @return \Catalog\Model\Product[]
     */
    public function getProductList(): array
    {
        $productsList = [];

        foreach ($this->getFromDatabase() as $productData) {
            $product = new \Catalog\Model\Product();
            $product->setName($productData['name'])
                ->setImage($productData['image'])
                ->setPrice((float) $productData['price']);
            $productsList[] = $product;
        }

        return $productsList;
    }

    /**
     * @TODO: implement reas interaction with database
     * @return array
     */
    private function getFromDatabase(): array
    {
        return [
            [
                'name' => 'Galaxy Note 7',
                'image' => '/images/galaxy_note_10.jpg',
                'price' => '555.55'
            ], [
                'name' => 'iPhone 11',
                'image' => '/images/iphone_11.jpg',
                'price' => '999.99'
            ],             [
                'name' => 'Galaxy Note 8',
                'image' => '/images/galaxy_note_10.jpg',
                'price' => '777.77'
            ], [
                'name' => 'iPhone 11',
                'image' => '/images/iphone_11.jpg',
                'price' => '999.99'
            ],             [
                'name' => 'Galaxy Note 9',
                'image' => '/images/galaxy_note_10.jpg',
                'price' => '888.88'
            ], [
                'name' => 'iPhone 11',
                'image' => '/images/iphone_11.jpg',
                'price' => '999.99'
            ],             [
                'name' => 'Galaxy Note 10',
                'image' => '/images/galaxy_note_10.jpg',
                'price' => '999.99'
            ], [
                'name' => 'iPhone 11',
                'image' => '/images/iphone_11.jpg',
                'price' => '999.99'
            ]
        ];
    }
}
