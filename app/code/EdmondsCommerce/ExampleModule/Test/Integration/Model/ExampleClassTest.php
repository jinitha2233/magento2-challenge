<?php

declare(strict_types=1);

namespace EdmondsCommerce\ExampleModule\Test\Integration\Model;

use EdmondsCommerce\ExampleModule\Model\ExampleClass;
use EdmondsCommerce\Testing\Test\Integration\AbstractMagentoTestCase;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use RuntimeException;

class ExampleClassTest extends AbstractMagentoTestCase
{
    /**
     * @var ProductInterfaceFactory
     */
    private $factory;
    /**
     * @var ExampleClass
     */
    private $testClass;

    public function setUp(): void
    {
        parent::setUp();
        $this->testClass = $this->getObjectManager()->get(ExampleClass::class);
        $this->factory   = $this->getObjectManager()->get(ProductInterfaceFactory::class);
    }

    /**
     * @test
     */
    public function itCanGetAProductName(?string $name, string $expected): void
    {
        $product = $this->factory->create();
        $product->setName($name);

        if ($name === null) {
            $this->expectException(RuntimeException::class);
        }

        $actual = $this->testClass->getProductName($product);
        self::assertSame($expected, $actual);
    }

    public function getNamesToTest(): array
    {
        return [
            'Handles simple names' => ['test', 'test'],
            'Handles complex name' => ['Name with spaces', 'Name with spaces'],
            'Handles nulls'        => [null, 'error'],
        ];
    }
}
