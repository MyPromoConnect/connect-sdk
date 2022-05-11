<?php

namespace MyPromo\Connect\SDK\Tests;

use MyPromo\Connect\SDK\Models\Callback;
use PHPUnit\Framework\TestCase;
use MyPromo\Connect\SDK\Helpers\ProductExportFilters;
use MyPromo\Connect\SDK\Helpers\ProductExportOptions;
use MyPromo\Connect\SDK\Models\ProductExport;

class ExportTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    public function setUp(): void
    {
        parent::setUp();

        $this->options = new ProductExportOptions();
        $this->options->setPage(1);
        $this->options->setPerPage(5);
        $this->options->setPagination(false);
        $this->options->setCreatedTo(new \DateTime(date('Y-m-d H:i:s')));
        $this->options->setCreatedFrom(new \DateTime(date('Y-m-d H:i:s')));
    }

    public function testOptions()
    {
        $this->assertIsNumeric($this->options->getPage());
        $this->assertIsNumeric($this->options->getPagination());
        $this->assertIsNumeric($this->options->getPerPage());
        $this->assertIsString($this->options->getCreatedTo());
        $this->assertIsString($this->options->getCreatedFrom());

        $this->assertIsArray($this->options->toArray());
    }

    /**
     */
    public function testPayload()
    {
        $productExportFilterOptions = new ProductExportFilters();
        $productExportFilterOptions->setCategoryId(1);
        $productExportFilterOptions->setCurrency('EUR');
        $productExportFilterOptions->setLang('DE');
        $productExportFilterOptions->setProductTypes('type of products that you want to include');
        $productExportFilterOptions->setSearch('search value for product | null');
        $productExportFilterOptions->setSku('SKU-PRODUCT');
        $productExportFilterOptions->setShippingFrom('DE');

        $this->assertIsArray($productExportFilterOptions->toArray());

        $productExport = new ProductExport();
        $productExport->setTempletaId('template_id');
        $productExport->setTempletaKey('template_key');
        $productExport->setFilters($productExportFilterOptions);

        $callback = new Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('basic');
        $callback->setAuthUsername('username');
        $callback->setAuthPassword('password');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productExport->toArray());

        $callback = new Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('header');
        $callback->setAuthHeader([
            'key' => 'Authorization',
            'value' => 'azVnvo0DtU6OVqa4SRUey2JfFIIzRt50',
        ]);

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productExport->toArray());

        $callback = new Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('oauth1');
        $callback->setAuthUrl('https://sample-shop.de/oauth/token');
        $callback->setAuthUsername('username');
        $callback->setAuthPassword('password');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productExport->toArray());

        $callback = new Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('oauth2');
        $callback->setAuthUrl('https://sample-shop.de/oauth/token');
        $callback->setAuthGrantType('password_grant');
        $callback->setAuthUsername('username');
        $callback->setAuthPassword('password');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productExport->toArray());

        $callback = new Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('oauth2');
        $callback->setAuthUrl('https://sample-shop.de/oauth/token');
        $callback->setAuthGrantType('client_credentials');
        $callback->setAuthClientId('client_id');
        $callback->setAuthSecret('secret');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productExport->toArray());
    }
}
