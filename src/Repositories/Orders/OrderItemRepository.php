<?php

namespace MyPromo\Connect\SDK\Repositories\Orders;

use Exception;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Exceptions\InputValidationException;
use MyPromo\Connect\SDK\Models\OrderItem;
use MyPromo\Connect\SDK\Repositories\Repository;
use GuzzleHttp\RequestOptions;

/**
 * Class OrderItemRepository
 * @package Connect\SDK\Repositories
 */
class OrderItemRepository extends Repository
{
    /**
     * @param OrderItem $orderItem
     *
     * @return array
     */
    public function submit($orderItem)
    {
        $orderId = $orderItem->getOrderId();

        if (!isset($orderId)) {
            throw new InputValidationException('Missing Order-ID.', 422);
        }

        try {
            $response = $this->client->guzzle()->post('/v1/orders/' . $orderId . '/items', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $orderItem->toArray(),
            ]);

        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        return $body;
    }
}
