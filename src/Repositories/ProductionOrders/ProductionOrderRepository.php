<?php

namespace MyPromo\Connect\SDK\Repositories\ProductionOrders;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Models\Shipment;
use MyPromo\Connect\SDK\Repositories\Repository;
use MyPromo\Connect\SDK\Helpers\ProductionOrderOptions;

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
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $orderId
     *
     * @return array
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
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);

    }

    /**
     * @param $orderId
     * @param Shipment $shipment
     * @return array
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
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);

    }

    /**
     * @param $orderId
     * @return array
     */
    public function genericLabel($orderId): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/production_orders/' . $orderId . '/generic_label', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ]
            ]);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);

    }

}
