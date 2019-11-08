<?php

namespace Connect\SDK\Models;

use Connect\SDK\Contracts\Arrayable;

/**
 * Class File
 * @package Connect\SDK\Models
 */
class File implements Arrayable
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $carrier;

    /**
     * @var string|null
     */
    protected $trackingCode;

    /**
     * @var string|null
     */
    protected $httpsBasicAuthUser;

    /**
     * @var string|null
     */
    protected $httpsBasicAuthPassword;

    /**
     * @var string|null
     */
    protected $httpsHeader;

    /**
     * @var string|null
     */
    protected $sftpUser;

    /**
     * @var string|null
     */
    protected $sftpPassword;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string|null $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return string|null
     */
    public function getTrackingCode()
    {
        return $this->trackingCode;
    }

    /**
     * @param string|null $trackingCode
     */
    public function setTrackingCode($trackingCode)
    {
        $this->trackingCode = $trackingCode;
    }

    /**
     * @return string|null
     */
    public function getHttpsBasicAuthUser()
    {
        return $this->httpsBasicAuthUser;
    }

    /**
     * @param string|null $httpsBasicAuthUser
     */
    public function setHttpsBasicAuthUser($httpsBasicAuthUser)
    {
        $this->httpsBasicAuthUser = $httpsBasicAuthUser;
    }

    /**
     * @return string|null
     */
    public function getHttpsBasicAuthPassword()
    {
        return $this->httpsBasicAuthPassword;
    }

    /**
     * @param string|null $httpsBasicAuthPassword
     */
    public function setHttpsBasicAuthPassword($httpsBasicAuthPassword)
    {
        $this->httpsBasicAuthPassword = $httpsBasicAuthPassword;
    }

    /**
     * @return string|null
     */
    public function getHttpsHeader()
    {
        return $this->httpsHeader;
    }

    /**
     * @param string|null $httpsHeader
     */
    public function setHttpsHeader($httpsHeader)
    {
        $this->httpsHeader = $httpsHeader;
    }

    /**
     * @return string|null
     */
    public function getSftpUser()
    {
        return $this->sftpUser;
    }

    /**
     * @param string|null $sftpUser
     */
    public function setSftpUser($sftpUser)
    {
        $this->sftpUser = $sftpUser;
    }

    /**
     * @return string|null
     */
    public function getSftpPassword()
    {
        return $this->sftpPassword;
    }

    /**
     * @param string|null $sftpPassword
     */
    public function setSftpPassword($sftpPassword)
    {
        $this->sftpPassword = $sftpPassword;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $fileArray = [
            'url'           => $this->url,
            'type'          => $this->type,
            'carrier'       => $this->carrier,
            'tracking_code' => $this->trackingCode,
        ];

        return $fileArray;
    }
}
