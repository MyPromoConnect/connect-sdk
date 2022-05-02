<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ClientConnectorConfigurationMagento implements Arrayable
{
    /**
     * @var string
     */
    protected $magento_connector_instance_url;

    /**
     * @var string
     */
    protected $magento_connector_api_username;

    /**
     * @var string
     */
    protected $magento_connector_api_password;

    /**
     * @var string
     */
    protected $magento_website_code;

    /**
     * @var string
     */
    protected $magento_store_code;

    /**
     * @var int
     */
    protected $magento_store_code_id;

    /**
     * @var int
     */
    protected $magento_website_code_id;

    /**
     * @var string
     */
    protected $magento_store_code_name;

    /**
     * @var string
     */
    protected $magento_website_code_name;

    /**
     * @var string
     */
    protected $sync_products_settings;

    /**
     * @var string
     */
    protected $sales_price_config;

    /**
     * @return string
     */
    public function getInstanceUrl(): string
    {
        return $this->magento_connector_instance_url;
    }

    /**
     * @param string $magento_connector_instance_url
     */
    public function setInstanceUrl(string $magento_connector_instance_url)
    {
        $this->magento_connector_instance_url = $magento_connector_instance_url;
    }

    /**
     * @return string
     */
    public function getApiUsername(): string
    {
        return $this->magento_connector_api_username;
    }

    /**
     * @param string $magento_connector_api_username
     */
    public function setApiUsername(string $magento_connector_api_username)
    {
        $this->magento_connector_api_username = $magento_connector_api_username;
    }

    /**
     * @return string
     */
    public function getApiPassword(): string
    {
        return $this->magento_connector_api_password;
    }

    /**
     * @param string $magento_connector_api_password
     */
    public function setApiPassword(string $magento_connector_api_password)
    {
        $this->magento_connector_api_password = $magento_connector_api_password;
    }

    /**
     * @return string
     */
    public function getWebsiteCode(): string
    {
        return $this->magento_website_code;
    }

    /**
     * @param string $magento_website_code
     */
    public function setWebsiteCode(string $magento_website_code)
    {
        $this->magento_website_code = $magento_website_code;
    }

    /**
     * @return int
     */
    public function getWebsiteCodeId(): int
    {
        return $this->magento_website_code_id;
    }

    /**
     * @param int $magento_website_code_id
     */
    public function setWebsiteCodeId(int $magento_website_code_id)
    {
        $this->magento_website_code_id = $magento_website_code_id;
    }

    /**
     * @return string
     */
    public function getWebsiteCodeName(): string
    {
        return $this->magento_website_code_name;
    }

    /**
     * @param string $magento_website_code_name
     */
    public function setWebsiteCodeName(string $magento_website_code_name)
    {
        $this->magento_website_code_name = $magento_website_code_name;
    }

    /**
     * @return string
     */
    public function getStoreCode(): string
    {
        return $this->magento_store_code;
    }

    /**
     * @param string $magento_store_code
     */
    public function setStoreCode(string $magento_store_code)
    {
        $this->magento_store_code = $magento_store_code;
    }

    /**
     * @return int
     */
    public function getStoreCodeId(): int
    {
        return $this->magento_store_code_id;
    }

    /**
     * @param int $magento_store_code_id
     */
    public function setStoreCodeId(int $magento_store_code_id)
    {
        $this->magento_store_code_id = $magento_store_code_id;
    }

    /**
     * @return string
     */
    public function getStoreCodeName(): string
    {
        return $this->magento_store_code_name;
    }

    /**
     * @param string $magento_store_code_name
     */
    public function setStoreCodeName(string $magento_store_code_name)
    {
        $this->magento_store_code_name = $magento_store_code_name;
    }

    /**
     * @return string
     */
    public function getSyncProductsSettings(): string
    {
        return $this->sync_products_settings;
    }

    /**
     * @param string $sync_products_settings
     */
    public function setSyncProductsSettings(string $sync_products_settings)
    {
        $this->sync_products_settings = $sync_products_settings;
    }

    /**
     * @return string
     */
    public function getSalesPriceConfig(): string
    {
        return $this->sales_price_config;
    }

    /**
     * @param string $sales_price_config
     */
    public function setSalesPriceConfig(string $sales_price_config)
    {
        $this->sales_price_config = $sales_price_config;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'magento_connector_instance_url' => $this->magento_connector_instance_url,
            'magento_connector_api_username' => $this->magento_connector_api_username,
            'magento_connector_api_password' => $this->magento_connector_api_password,
            'magento_website_code'           => $this->magento_website_code,
            'magento_store_code'             => $this->magento_store_code,
            'magento_store_code_id'          => $this->magento_store_code_id,
            'magento_website_code_id'        => $this->magento_website_code_id,
            'magento_store_code_name'        => $this->magento_store_code_name,
            'magento_website_code_name'      => $this->magento_website_code_name,
            'sync_products_settings'         => $this->sync_products_settings,
            'sales_price_config'             => $this->sales_price_config
        ];
    }
}
