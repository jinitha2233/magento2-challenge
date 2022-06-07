<?php

declare(strict_types=1);

namespace EdmondsCommerce\ExampleModule\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use RuntimeException;

class ExampleClass
{

    public function getProductName(ProductInterface $product): string
    {
        $name = $product->getName();
        if ($name === null) {
            throw new RuntimeException('No Name has been set for the product');
        }

        return $name;
    }

    public function add(float $left, float $right): float
    {
        return $left + $right;
    }
}
