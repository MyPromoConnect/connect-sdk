<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ClientSettingMerchant implements Arrayable
{
    /**
     * @var int
     */
    protected $sent_to_production_delay;

    /**
     * @var string
     */
    protected $has_to_supply_carrier;

    /**
     * @var string
     */
    protected $has_to_supply_tracking_code;

    /**
     * @var int
     */
    protected $price_reset_logic;

    /**
     * @var int
     */
    protected $adjust_max_up_percentage;

    /**
     * @var int
     */
    protected $adjust_max_down_percentage;

    /**
     * @var string
     */
    protected $activate_new_fulfillers;

    /**
     * @var string
     */
    protected $activate_new_products;

    /**
     * @return int
     */
    public function getSentToProductionDelay(): int
    {
        return $this->sent_to_production_delay;
    }

    /**
     * @param int $sent_to_production_delay
     */
    public function setSentToProductionDelay(int $sent_to_production_delay)
    {
        $this->sent_to_production_delay = $sent_to_production_delay;
    }

    /**
     * @return string
     */
    public function getHasToSupplyCarrier(): string
    {
        return $this->has_to_supply_carrier;
    }

    /**
     * @param string $has_to_supply_carrier
     */
    public function setHasToSupplyCarrier(string $has_to_supply_carrier)
    {
        $this->has_to_supply_carrier = $has_to_supply_carrier;
    }

    /**
     * @return string
     */
    public function getHasToSupplyTrackingCode(): string
    {
        return $this->has_to_supply_tracking_code;
    }

    /**
     * @param string $has_to_supply_tracking_code
     */
    public function setHasToSupplyTrackingCode(string $has_to_supply_tracking_code)
    {
        $this->has_to_supply_tracking_code = $has_to_supply_tracking_code;
    }

    /**
     * @return int
     */
    public function getPriceResetLogic(): int
    {
        return $this->price_reset_logic;
    }

    /**
     * @param int $price_reset_logic
     */
    public function setPriceResetLogic(int $price_reset_logic)
    {
        $this->price_reset_logic = $price_reset_logic;
    }

    /**
     * @return int
     */
    public function getAdjustMaxUpPercentage(): int
    {
        return $this->adjust_max_up_percentage;
    }

    /**
     * @param int $adjust_max_up_percentage
     */
    public function setAdjustMaxUpPercentage(int $adjust_max_up_percentage)
    {
        $this->adjust_max_up_percentage = $adjust_max_up_percentage;
    }

    /**
     * @return int
     */
    public function getAdjustMaxDownPercentage(): int
    {
        return $this->adjust_max_down_percentage;
    }

    /**
     * @param int $adjust_max_down_percentage
     */
    public function setAdjustMaxDownPercentage(int $adjust_max_down_percentage)
    {
        $this->adjust_max_down_percentage = $adjust_max_down_percentage;
    }

    /**
     * @return string
     */
    public function getActivateNewFulfiller(): string
    {
        return $this->activate_new_fulfillers;
    }

    /**
     * @param string $activate_new_fulfillers
     */
    public function setActivateNewFulfiller(string $activate_new_fulfillers)
    {
        $this->activate_new_fulfillers = $activate_new_fulfillers;
    }

    /**
     * @return string
     */
    public function getActivateNewProducts(): string
    {
        return $this->activate_new_products;
    }

    /**
     * @param string $activate_new_products
     */
    public function setActivateNewProducts(string $activate_new_products)
    {
        $this->activate_new_products = $activate_new_products;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $resultArray = [];

        $resultArray['production'] = [
            'sent_to_production_delay' => $this->sent_to_production_delay
        ];

        $resultArray['shipping'] = [
            'has_to_supply_carrier' => $this->has_to_supply_carrier,
            'has_to_supply_tracking_code' => $this->has_to_supply_tracking_code,
        ];

        $resultArray['price_rules'] = [
            'price_reset_logic' => $this->price_reset_logic,
            'adjust_max_up_percentage' => $this->adjust_max_up_percentage,
            'adjust_max_down_percentage' => $this->adjust_max_down_percentage
        ];

        $resultArray['automatisms'] = [
            'activate_new_fulfillers' => $this->activate_new_fulfillers,
            'activate_new_products' => $this->activate_new_products
        ];

        return $resultArray;
    }
}
