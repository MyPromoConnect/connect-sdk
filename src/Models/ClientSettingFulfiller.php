<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ClientSettingFulfiller implements Arrayable
{
    /**
     * @var string
     */
    protected $has_to_supply_carrier;

    /**
     * @var string
     */
    protected $has_to_supply_tracking_code;

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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $resultArray = [];

        $resultArray['shipping'] = [
            'has_to_supply_carrier' => $this->has_to_supply_carrier,
            'has_to_supply_tracking_code' => $this->has_to_supply_tracking_code,
        ];

        return $resultArray;
    }
}
