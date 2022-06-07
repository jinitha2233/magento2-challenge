<?php

declare(strict_types=1);

namespace EdmondsCommerce\ExampleModule\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use RuntimeException;

class ExampleClass
{

    /**
     * Simple function that takes a Product object and returns the name. This should have an integration test
     */
    public function getProductName(ProductInterface $product): string
    {
        $name = $product->getName();
        if ($name === null) {
            throw new RuntimeException('No Name has been set for the product');
        }

        return $name;
    }

    /**
     * Simple function that only deals with scalars. This can be unit tested
     */
    public function add(float $left, float $right): float
    {
        return $left + $right;
    }
}
