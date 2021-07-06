<?php

namespace MyPromo\Connect\SDK\Repositories\Orders;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Models\Shipment;
use Psr\Cache\InvalidArgumentException;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Repositories\Repository;
use MyPromo\Connect\SDK\Helpers\ProductionOrderOptions;
use MyPromo\Connect\SDK\Exceptions\ProductionOrderException;

class ProductionOrderRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *      created_from
     *      created_to
     *      updated_from
     *      updated_to
     *
     * You can use the @param array|ProductionOrderOptions $options
     *
     * @return array
     *
     * @throws InvalidArgumentException
     * @throws GuzzleException
     * @throws ProductionOrderException
     * @see    ProductionOrderOptions as its helper
     *
     */
    public function all($options): array
    {
        if ($options instanceof ProductionOrderOptions) {
            $options = $options->toArray();
        }

        try {
            $response = $this->client->guzzle()->get('/v1/production_orders', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductionOrderException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductionOrderException($ex->getMessage(), $ex->getCode());
        }

    }

    /**
     * @param int $orderId
     *
     * @return array
     *
     * @throws InvalidArgumentException
     * @throws ProductionOrderException|GuzzleException
     */
    public function find($orderId): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/production_orders/' . $orderId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductionOrderException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductionOrderException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $orderId
     * @param Shipment $shipment
     * @return array
     *
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws ProductionOrderException
     */
    public function addShipment($orderId, Shipment $shipment): array
    {
        try {
            $response = $this->client->guzzle()->post('/v1/production_orders/' . $orderId . '/add_shipment', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $shipment->toArray(),
            ]);

            if ($response->getStatusCode() !== 201) {
                throw new ProductionOrderException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductionOrderException($ex->getMessage(), $ex->getCode());
        }
    }

}
