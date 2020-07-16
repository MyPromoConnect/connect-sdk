<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 12:38
 */

namespace MyPromo\Connect\SDK\Repositories\Products;

use MyPromo\Connect\SDK\Exceptions\ClientException;
use MyPromo\Connect\SDK\Exceptions\MissingCredentialsException;
use MyPromo\Connect\SDK\Exceptions\ProductException;
use MyPromo\Connect\SDK\Helpers\InventoryOptions;
use MyPromo\Connect\SDK\Helpers\PriceOptions;
use MyPromo\Connect\SDK\Helpers\ProductOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

class ProductRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *      shipping_from
     *      search
     *      available
     *      sku
     *      lang
     *      currency
     *
     * You can use the @param array|ProductOptions $options
     *
     * @return array
     * @throws ProductException
     * @throws \MyPromo\Connect\SDK\Exceptions\ClientException
     * @throws \MyPromo\Connect\SDK\Exceptions\MissingCredentialsException
     */
    public function all($options) {
        if ($options instanceof ProductOptions) {
            $options = $options->toArray();
        }

        $response = $this->client->guzzle()->get('/v1/products', [
            'headers' => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            'query' => $options,
        ])
        ;

        if ($response->getStatusCode() !== 200) {
            throw new ProductException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $productId
     *
     * @return array
     * @throws ProductException
     * @throws ClientException
     * @throws MissingCredentialsException
     */
    public function find($productId) {
        $response = $this->client->guzzle()->get('/v1/products/' . $productId, [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new ProductException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * Available options:
     *      from
     *      per_page
     *      sku
     *      shipping_from
     *
     * You can use the @param array|InventoryOptions $options
     *
     * @return array
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws ProductException
     */
    public function getInventory($options) {
        $response = $this->client->guzzle()->get('/v1/inventory', [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            'query' => $options
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new ProductException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $productInventory
     *
     * @return array
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws ProductException
     */
    public function putInventory($productInventory) {
        $response = $this->client->guzzle()->post('/v1/inventory', [
            'headers'            => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            RequestOptions::JSON => $productInventory->toArray(),
        ])
        ;

        if ($response->getStatusCode() !== 200) {
            throw new ProductException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * Available options:
     *      from
     *      per_page
     *      sku
     *      shipping_from
     *
     * You can use the @param array|PriceOptions $options
     *
     * @return array
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws ProductException
     */
    public function getPrices($options) {
        if ($options instanceof ProductOptions) {
            $options = $options->toArray();
        }

        $response = $this->client->guzzle()->get('/v1/prices', [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            'query' => $options
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new ProductException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $productPriceUpdate
     *
     * @return array
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws ProductException
     */
    public function putPrices($productPriceUpdate) {
        $response = $this->client->guzzle()->post('/v1/inventory', [
            'headers'            => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            RequestOptions::JSON => $productPriceUpdate->toArray(),
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new ProductException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        return $body;
    }
}
