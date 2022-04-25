<?php

namespace MyPromo\Connect\SDK\Repositories\Orders;

use GuzzleHttp\Exception\GuzzleException;
use Exception;
use MyPromo\Connect\SDK\Exceptions\MissingOrderException;
use MyPromo\Connect\SDK\Exceptions\OrderException;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use MyPromo\Connect\SDK\Models\OrderItem;
use MyPromo\Connect\SDK\Repositories\Repository;
use GuzzleHttp\RequestOptions;
use Psr\Cache\InvalidArgumentException;

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
     *
     * @throws MissingOrderException
     * @throws OrderException
     * @throws InvalidArgumentException
     */
    public function submit($orderItem)
    {
        $orderId = $orderItem->getOrderId();

        if (!isset($orderId)) {
            throw new MissingOrderException('Missing Order-ID.');
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

            if ($response->getStatusCode() !== 201) {
                throw new OrderException($response->getBody(), $response->getStatusCode());
            }

            $body = json_decode($response->getBody(), true);

        } catch (GuzzleException $ex) {
            throw new OrderException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new OrderException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }
}
