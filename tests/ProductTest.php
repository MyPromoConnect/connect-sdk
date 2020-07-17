<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 17.07.20
 * Time: 10:55
 */

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Models\ProductAvailability;
use MyPromo\Connect\SDK\Models\ProductInventory;
use MyPromo\Connect\SDK\Models\ProductPrices;
use MyPromo\Connect\SDK\Models\ProductPriceUpdate;
use MyPromo\Connect\SDK\Models\ProductSalePrice;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @var ProductInventory
     */
    protected $productInventory;

    /**
     * @var ProductPriceUpdate
     */
    protected $productPriceUpdate;

    public function setUp(): void
    {
        parent::setUp();

        $this->productInventory = new ProductInventory();

        $productAvailability1 = new ProductAvailability();
        $productAvailability1->setSku('TESTSKU');
        $productAvailability1->setAvailable(true);

        $productAvailability2 = new ProductAvailability();
        $productAvailability2->setSku('TESTSKU2');
        $productAvailability2->setAvailable(false);

        $productAvailabilities = [
            $productAvailability1,
            $productAvailability2
        ];

        $this->productInventory->setProductAvailabilities($productAvailabilities);

        $this->productPriceUpdate = new ProductPriceUpdate();

        //prepare the sale prices array for the ProductPrice objects.
        $productSalePrice1 = new ProductSalePrice();
        $productSalePrice1->setPrice('19.99');
        $productSalePrice1->setTierQuantity('20');

        $productSalePrice2 = new ProductSalePrice();
        $productSalePrice2->setPrice('9.99');
        $productSalePrice2->setTierQuantity('60');

        $productSalePrices = [
            $productSalePrice1,
            $productSalePrice2
        ];

        $productPrices1 = new ProductPrices();
        $productPrices1->setSku('TESTSKU');
        $productPrices1->setCurrency('EUR');
        $productPrices1->setSalePrices($productSalePrices);

        $productPrices2 = new ProductPrices();
        $productPrices2->setSku('TESTSKU2');
        $productPrices2->setCurrency('EUR');
        $productPrices2->setSalePrices($productSalePrices);

        $productPricesArray = [
            $productPrices1,
            $productPrices2
        ];

        $this->productPriceUpdate->setProductPrices($productPricesArray);
    }

    public function testPriceUpdateArrayStructure() {
        $priceUpdateArray = $this->productPriceUpdate->toArray();

        $this->assertIsArray($priceUpdateArray);
        $this->assertArrayHasKey('data', $priceUpdateArray);
        $this->assertIsArray($priceUpdateArray['data']);
        $this->assertCount(2, $priceUpdateArray['data']);

        $this->assertArrayHasKey('sku', $priceUpdateArray['data'][0]);
        $this->assertIsString($priceUpdateArray['data'][0]['sku']);
        $this->assertArrayHasKey('prices', $priceUpdateArray['data'][0]);

        $this->assertIsArray($priceUpdateArray['data'][0]['prices']);
        $this->assertArrayHasKey('currency', $priceUpdateArray['data'][0]['prices']);
        $this->assertIsString($priceUpdateArray['data'][0]['prices']['currency']);
        $this->assertArrayHasKey('sales_prices', $priceUpdateArray['data'][0]['prices']);

        $this->assertIsArray($priceUpdateArray['data'][0]['prices']['sales_prices']);
        $this->assertCount(2, $priceUpdateArray['data'][0]['prices']['sales_prices']);

        $this->assertArrayHasKey('qty', $priceUpdateArray['data'][0]['prices']['sales_prices'][0]);
        $this->assertIsInt($priceUpdateArray['data'][0]['prices']['sales_prices'][0]['qty']);
        $this->assertArrayHasKey('price', $priceUpdateArray['data'][0]['prices']['sales_prices'][0]);
        $this->assertIsFloat($priceUpdateArray['data'][0]['prices']['sales_prices'][0]['price']);
    }

    public function testInventoryArrayStructure() {
        $inventoryArray = $this->productInventory->toArray();

        $this->assertIsArray($inventoryArray);
        $this->assertArrayHasKey($inventoryArray['data']);
        $this->assertIsArray($inventoryArray['data']);
        $this->assertCount(2, $inventoryArray['data']);

        $this->assertIsArray($inventoryArray['data'][0]);
        $this->assertArrayHasKey('sku', $inventoryArray['data'][0]);
        $this->assertIsString($inventoryArray['data'][0]['sku']);
        $this->assertArrayHasKey('available', $inventoryArray['data'][0]);
        $this->assertIsBool($inventoryArray['data'][0]['available']);
    }
}
