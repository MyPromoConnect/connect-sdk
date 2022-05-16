<?php

namespace MyPromo\Connect\SDK\Repositories\ProductionOrders;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Models\ProductionOrders\Shipment;
use MyPromo\Connect\SDK\Repositories\Repository;
use MyPromo\Connect\SDK\Helpers\ProductionOrders\ProductionOrderOptions;

class ProductionOrderRepository extends Repository
{
    /**
     * @param ProductionOrderOptions $options
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function all(ProductionOrderOptions $options): array
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
     * @param int $productionOrderId
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function find(int $productionOrderId): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/production_orders/' . $productionOrderId, [
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
     * @param int $productionOrderId
     * @param Shipment $shipment
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function addShipment(int $productionOrderId, Shipment $shipment): array
    {
        try {
            $response = $this->client->guzzle()->post('/v1/production_orders/' . $productionOrderId . '/add_shipment', [
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
     * @param int $productionOrderId
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function genericLabel(int $productionOrderId): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/production_orders/' . $productionOrderId . '/generic_label', [
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
