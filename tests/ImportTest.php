<?php

namespace MyPromo\Connect\SDK\Tests;

use PHPUnit\Framework\TestCase;
use MyPromo\Connect\SDK\Models\ProductImport;
use MyPromo\Connect\SDK\Exceptions\OrderException;
use MyPromo\Connect\SDK\Helpers\ProductImportInput;
use MyPromo\Connect\SDK\Helpers\ProductImportOptions;

class ImportTest extends TestCase
{
    /**
     * @var $options
     */
    protected $options;

    /**
     * @var $importInputs
     */
    protected $importInputs;

    public function setUp(): void
    {
        parent::setUp();

        $this->options = new ProductImportOptions();
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
     * @throws OrderException
     */
    public function testPayload()
    {
        $this->importInputs = new ProductImportInput();
        $this->importInputs->setFormat('xlsx');
        $this->importInputs->setUrl('https://downloads.test.mypromo.com/feeds/Merchant-Prices.xlsx');

        $this->importInputs->setHttpsHeader([
            'key' => 'key',
            'value' => 'value'
        ]);

        $this->importInputs->setSftpUser('user');
        $this->importInputs->setSftpPassword('pass');

        $this->importInputs->setHttpsBasicAuthUser('user');
        $this->importInputs->setHttpsBasicAuthPassword('pass');

        $this->importInputs->setOAuthCredentials([
            'username' => 'user',
            'password' => 'password'
        ]);

        $this->importInputs->setOAuth2Credentials([
            'username' => 'user',
            'password' => 'password'
        ]);

        $productImport = new ProductImport();
        $productImport->setTempletaId('template_key');
        $productImport->setTempletaKey('template_key');
        $productImport->setDryRun(false);
        $productImport->setInput($this->importInputs);

        $this->assertIsArray($this->importInputs->toArray());

        $callback = new \MyPromo\Connect\SDK\Models\Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('basic');
        $callback->setAuthUsername('username');
        $callback->setAuthPassword('password');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productImport->toArray());

        $callback = new \MyPromo\Connect\SDK\Models\Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('header');
        $callback->setAuthHeader([
            'key' => 'Authorization',
            'value' => 'azVnvo0DtU6OVqa4SRUey2JfFIIzRt50',
        ]);

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productImport->toArray());

        $callback = new \MyPromo\Connect\SDK\Models\Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('oauth1');
        $callback->setAuthUrl('https://sample-shop.de/oauth/token');
        $callback->setAuthUsername('username');
        $callback->setAuthPassword('password');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productImport->toArray());

        $callback = new \MyPromo\Connect\SDK\Models\Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('oauth2');
        $callback->setAuthUrl('https://sample-shop.de/oauth/token');
        $callback->setAuthGrantType('password_grant');
        $callback->setAuthUsername('username');
        $callback->setAuthPassword('password');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productImport->toArray());

        $callback = new \MyPromo\Connect\SDK\Models\Callback();
        $callback->setUrl('https://sample-shop.de/callback');
        $callback->setAuthType('oauth2');
        $callback->setAuthUrl('https://sample-shop.de/oauth/token');
        $callback->setAuthGrantType('client_credentials');
        $callback->setAuthClientId('client_id');
        $callback->setAuthSecret('secret');

        $this->assertIsArray($callback->toArray());
        $this->assertIsArray($productImport->toArray());
    }
}
