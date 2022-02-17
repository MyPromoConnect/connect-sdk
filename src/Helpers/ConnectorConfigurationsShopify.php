<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ConnectorConfigurationsShopify implements Arrayable
{
    /**
     * @var string
     */
    protected $spy_shop_name;

    /**
     * @var string
     */
    protected $spy_token;

    /**
     * @var string
     */
    protected $spy_shop_url;

    /**
     * @var string
     */
    protected $spy_sales_price_config;

    /**
     * @var string
     */
    protected $spy_sync_products_settings;

    /**
     * @var string
     */
    protected $spy_shop_currency;

    /**
     * @var string
     */
    protected $spy_products_language;

    /**
     * @var bool
     */
    protected $spy_recreate_deleted_products;

    /**
     * @var bool
     */
    protected $spy_update_images;

    /**
     * @var bool
     */
    protected $spy_update_products;

    /**
     * @var bool
     */
    protected $spy_update_seo;

    /**
     * @var bool
     */
    protected $spy_create_collections;

    /**
     * @var bool
     */
    protected $spy_recreate_deleted_collections;

    /**
     * @return string
     */
    public function getShopName(): string
    {
        return $this->spy_shop_name;
    }

    /**
     * @param string $spy_shop_name
     */
    public function setShopName(string $spy_shop_name)
    {
        $this->spy_shop_name = $spy_shop_name;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->spy_token;
    }

    /**
     * @param string $spy_token
     */
    public function setToken(string $spy_token)
    {
        $this->spy_token = $spy_token;
    }

    /**
     * @return string
     */
    public function getShopUrl(): string
    {
        return $this->spy_shop_url;
    }

    /**
     * @param string $spy_shop_url
     */
    public function setShopUrl(string $spy_shop_url)
    {
        $this->spy_shop_url = $spy_shop_url;
    }

    /**
     * @return string
     */
    public function getSalePriceConfig(): string
    {
        return $this->spy_sales_price_config;
    }

    /**
     * @param string $spy_sales_price_config
     */
    public function setSalePriceConfig(string $spy_sales_price_config)
    {
        $this->spy_sales_price_config = $spy_sales_price_config;
    }

    /**
     * @return bool
     */
    public function getRecreateDeletedProducts(): bool
    {
        return $this->spy_recreate_deleted_products;
    }

    /**
     * @param bool $spy_recreate_deleted_products
     */
    public function setRecreateDeletedProducts(bool $spy_recreate_deleted_products)
    {
        $this->spy_recreate_deleted_products = $spy_recreate_deleted_products;
    }

    /**
     * @return string
     */
    public function getSyncProductSettings(): string
    {
        return $this->spy_sync_products_settings;
    }

    /**
     * @param string $spy_sync_products_settings
     */
    public function setSyncProductSettings(string $spy_sync_products_settings)
    {
        $this->spy_sync_products_settings = $spy_sync_products_settings;
    }

    /**
     * @return string
     */
    public function getShopCurrency(): string
    {
        return $this->spy_shop_currency;
    }

    /**
     * @param string $spy_shop_currency
     */
    public function setShopCurrency(string $spy_shop_currency)
    {
        $this->spy_shop_currency = $spy_shop_currency;
    }

    /**
     * @return string
     */
    public function getProductsLanguage(): string
    {
        return $this->spy_products_language;
    }

    /**
     * @param string $spy_products_language
     */
    public function setProductsLanguage(string $spy_products_language)
    {
        $this->spy_products_language = $spy_products_language;
    }

    /**
     * @return bool
     */
    public function getUpdateImages(): bool
    {
        return $this->spy_update_images;
    }

    /**
     * @param bool $spy_update_images
     */
    public function setUpdateImages(bool $spy_update_images)
    {
        $this->spy_update_images = $spy_update_images;
    }

    /**
     * @return bool
     */
    public function getUpdateProducts(): bool
    {
        return $this->spy_update_products;
    }

    /**
     * @param bool $spy_update_products
     */
    public function setUpdateProducts(bool $spy_update_products)
    {
        $this->spy_update_products = $spy_update_products;
    }

    /**
     * @return bool
     */
    public function getUpdateSeo(): bool
    {
        return $this->spy_update_seo;
    }

    /**
     * @param bool $spy_update_seo
     */
    public function setUpdateSeo(bool $spy_update_seo)
    {
        $this->spy_update_seo = $spy_update_seo;
    }

    /**
     * @return bool
     */
    public function getCreateCollections(): bool
    {
        return $this->spy_create_collections;
    }

    /**
     * @param bool $spy_create_collections
     */
    public function setCreateCollections(bool $spy_create_collections)
    {
        $this->spy_create_collections = $spy_create_collections;
    }

    /**
     * @return bool
     */
    public function getRecreateDeletedCollection(): bool
    {
        return $this->spy_recreate_deleted_collections;
    }

    /**
     * @param bool $spy_recreate_deleted_collections
     */
    public function setRecreateDeletedCollection(bool $spy_recreate_deleted_collections)
    {
        $this->spy_recreate_deleted_collections = $spy_recreate_deleted_collections;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'spy_shop_name' => $this->spy_shop_name,
            'spy_token' => $this->spy_token,
            'spy_shop_url' => $this->spy_shop_url,
            'spy_sales_price_config' => $this->spy_sales_price_config,
            'spy_recreate_deleted_products' => $this->spy_recreate_deleted_products,
            'spy_sync_products_settings' => $this->spy_sync_products_settings,
            'spy_shop_currency' => $this->spy_shop_currency,
            'spy_products_language' => $this->spy_products_language,
            'spy_update_images' => $this->spy_update_images,
            'spy_update_products' => $this->spy_update_products,
            'spy_update_seo' => $this->spy_update_seo,
            'spy_create_collections' => $this->spy_create_collections,
            'spy_recreate_deleted_collections' => $this->spy_recreate_deleted_collections,
        ];
    }
}
