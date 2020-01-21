<?php
/**
 * @file          Callback.php
 * @since         20.01.20, 14:18
 *
 * @copyright (c) 2020.
 * @author        Mohammad Abazid <mab@os-cillation.de>
 */

namespace MyPromo\Connect\SDK\Models;


use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\OrderException;

/**
 * Class Callback
 * @package MyPromo\Connect\SDK\Models
 */
class Callback implements Arrayable
{

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $auth_username;

    /**
     * @var string
     */
    protected $auth_password;

    /**
     * @var string
     */
    protected $auth_header;

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
    public function getAuthUsername()
    {
        return $this->auth_username;
    }

    /**
     * @param string $auth_username
     */
    public function setAuthUsername($auth_username)
    {
        $this->auth_username = $auth_username;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->auth_password;
    }

    /**
     * @param string $auth_password
     */
    public function setAuthPassword($auth_password)
    {
        $this->auth_password = $auth_password;
    }

    /**
     * @return string
     */
    public function getAuthHeader()
    {
        return $this->auth_header;
    }

    /**
     * @param string $auth_header
     */
    public function setAuthHeader($auth_header)
    {
        $this->auth_header = $auth_header;
    }

    /**
     * @inheritDoc
     * @throws OrderException
     */
    public function toArray()
    {
        if (empty($this->url)) {
            /**
             * This is out of behavior for the normal ->toArray implementation
             * But we cannot allow to send callback without url
             */
            if (!empty($designs) && !empty($files)) {
                throw new OrderException('Callback url is missing.');
            }
        }

        $callbackArray['url'] = $this->url;

        if (
            !empty($this->auth_username)
            && !empty($this->auth_password)
        ) {
            $callbackArray['auth']['basic']['username'] = $this->auth_username;
            $callbackArray['auth']['basic']['password'] = $this->auth_password;
        } elseif (!empty($this->auth_header)) {
            $callbackArray['auth']['header'] = $this->auth_header;
        }

        return $callbackArray;
    }
}
