<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\OrderException;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Validation;

/**
 * Class Callback
 * @package MyPromo\Connect\SDK\Models
 */
class Callback implements Arrayable
{
    const AUTH_TYPE_NONE = 'none';
    const AUTH_TYPE_BASIC = 'basic';
    const AUTH_TYPE_HEADER = 'header';
    const AUTH_TYPE_OAUTH1 = 'oauth1';
    const AUTH_TYPE_OAUTH2 = 'oauth2';

    const AUTH_GRANT_TYPE_PASSWORD = 'password_grant';
    const AUTH_GRANT_TYPE_CLIENT_CREDENTIALS = 'client_credentials';

    const SUPPORTED_AUTH_TYPES = [
        self::AUTH_TYPE_NONE,
        self::AUTH_TYPE_BASIC,
        self::AUTH_TYPE_HEADER,
        self::AUTH_TYPE_OAUTH1,
        self::AUTH_TYPE_OAUTH2,
    ];

    const SUPPORTED_AUTH_GRANT_TYPES = [
        self::AUTH_GRANT_TYPE_PASSWORD,
        self::AUTH_GRANT_TYPE_CLIENT_CREDENTIALS,
    ];

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $authType;

    /**
     * @var string
     */
    protected $authUsername;

    /**
     * @var string
     */
    protected $authPassword;

    /**
     * @var array|null
     */
    protected $authHeader;

    /**
     * @var string
     */
    protected $authSecret;

    /**
     * @var string
     */
    protected $authUrl;

    /**
     * @var string
     */
    protected $authGrantType;

    /**
     * @var string
     */
    protected $authClientId;

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
        return $this->authUsername;
    }

    /**
     * @param string $authUsername
     */
    public function setAuthUsername($authUsername)
    {
        $this->authUsername = $authUsername;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->authPassword;
    }

    /**
     * @param string $authPassword
     */
    public function setAuthPassword($authPassword)
    {
        $this->authPassword = $authPassword;
    }

    /**
     * @return array|null
     */
    public function getAuthHeader(): ?array
    {
        return $this->authHeader;
    }

    /**
     * @param  array  $authHeader
     * @throws OrderException
     */
    public function setAuthHeader(array $authHeader)
    {
        $validator = Validation::createValidator();
        $constraints = new Collection([
            'key' => [
                new Type('string'),
                new Length(['min' => 2]),
                new NotNull(),
            ],
            'value' => [
                new Type('string'),
                new Length(['min' => 2]),
                new NotNull(),
            ],
        ]);

        $violations = $validator->validate($authHeader, $constraints);
        if ($violations->count() > 0) {
            throw new OrderException($violations);
        }

        $this->authHeader = $authHeader;
    }

    /**
     * @return string
     */
    public function getAuthType()
    {
        return $this->authType;
    }

    /**
     * @param string $authType
     */
    public function setAuthType($authType)
    {
        $this->authType = $authType;
    }

    /**
     * @return string
     */
    public function getAuthSecret()
    {
        return $this->authSecret;
    }

    /**
     * @param string $authSecret
     */
    public function setAuthSecret($authSecret)
    {
        $this->authSecret = $authSecret;
    }

    /**
     * @return string
     */
    public function getAuthUrl()
    {
        return $this->authUrl;
    }

    /**
     * @param string $authUrl
     */
    public function setAuthUrl($authUrl)
    {
        $this->authUrl = $authUrl;
    }

    /**
     * @return string
     */
    public function getAuthGrantType()
    {
        return $this->authGrantType;
    }

    /**
     * @param string $authGrantType
     */
    public function setAuthGrantType($authGrantType)
    {
        $this->authGrantType = $authGrantType;
    }

    /**
     * @return string
     */
    public function getAuthClientId()
    {
        return $this->authClientId;
    }

    /**
     * @param string $authClientId
     */
    public function setAuthClientId($authClientId)
    {
        $this->authClientId = $authClientId;
    }

    /**
     * @inheritDoc
     * @throws OrderException
     */
    public function toArray()
    {
        /**
         * This is out of behavior for the normal ->toArray implementation
         * But we cannot allow to send a callback with invalid authentication params
         */

        if (empty($this->url)) {
            throw new OrderException('Callback url is missing.');
        }

        //decide authType
        if (empty($this->authType)) {
            if (!empty($this->authUsername) && !empty($this->authPassword)) {
                $this->authType = self::AUTH_TYPE_BASIC;
            } elseif (!empty($this->authHeader)) {
                $this->authType = self::AUTH_TYPE_HEADER;
            } else {
                $this->authType = self::AUTH_TYPE_NONE;
            }
        }

        if (!in_array($this->authType, self::SUPPORTED_AUTH_TYPES)) {
            throw new OrderException(
                "Callback authentication type '{$this->authType}' is not supported."
                . "Only the following authentication types are allowed ("
                . implode(', ', self::SUPPORTED_AUTH_TYPES) . ")"
            );
        }

        $callbackArray['url'] = $this->url;

        switch ($this->authType) {
            case self::AUTH_TYPE_BASIC:
                if (empty($this->authUsername)) {
                    throw new OrderException("Callback authentication username is missing.");
                }

                if (empty($this->authPassword)) {
                    throw new OrderException("Callback authentication password is missing.");
                }

                $callbackArray['auth']['basic']['username'] = $this->authUsername;
                $callbackArray['auth']['basic']['password'] = $this->authPassword;

                return $callbackArray;
            case self::AUTH_TYPE_HEADER:
                if (empty($this->authHeader)) {
                    throw new OrderException("Callback authentication header key/value pair is missing.");
                }

                $callbackArray['auth']['header'] = $this->authHeader;

                return $callbackArray;
            case self::AUTH_TYPE_OAUTH1:
                if (empty($this->authUrl)) {
                    throw new OrderException("Callback authentication url is missing.");
                }

                if (empty($this->authUsername)) {
                    throw new OrderException("Callback authentication username is missing.");
                }

                if (empty($this->authPassword)) {
                    throw new OrderException("Callback authentication password is missing.");
                }

                $callbackArray['auth']['oauth1']['auth_url'] = $this->authUrl;
                $callbackArray['auth']['oauth1']['username'] = $this->authUsername;
                $callbackArray['auth']['oauth1']['password'] = $this->authPassword;

                return $callbackArray;
            case self::AUTH_TYPE_OAUTH2:
                if (empty($this->authUrl)) {
                    throw new OrderException("Callback authentication url is missing.");
                }

                if (empty($this->authGrantType)) {
                    throw new OrderException("Callback authentication grant type is missing.");
                }

                switch ($this->authGrantType) {
                    case self::AUTH_GRANT_TYPE_PASSWORD:
                        if (empty($this->authUsername)) {
                            throw new OrderException("Callback authentication username is missing.");
                        }

                        if (empty($this->authPassword)) {
                            throw new OrderException("Callback authentication password is missing.");
                        }

                        $callbackArray['auth']['oauth2']['auth_url']   = $this->authUrl;
                        $callbackArray['auth']['oauth2']['grant_type'] = self::AUTH_GRANT_TYPE_PASSWORD;
                        $callbackArray['auth']['oauth2']['username']   = $this->authUsername;
                        $callbackArray['auth']['oauth2']['password']   = $this->authPassword;
                        $callbackArray['auth']['oauth2']['client_id']  = empty($this->authClientId) ? null : $this->authClientId;

                        return $callbackArray;
                    case self::AUTH_GRANT_TYPE_CLIENT_CREDENTIALS:
                        if (empty($this->authClientId)) {
                            throw new OrderException("Callback authentication client ID is missing.");
                        }

                        if (empty($this->authSecret)) {
                            throw new OrderException("Callback authentication secret is missing.");
                        }

                        $callbackArray['auth']['oauth2']['auth_url']   = $this->authUrl;
                        $callbackArray['auth']['oauth2']['grant_type'] = self::AUTH_GRANT_TYPE_CLIENT_CREDENTIALS;
                        $callbackArray['auth']['oauth2']['client_id']  = $this->authClientId;
                        $callbackArray['auth']['oauth2']['secret']     = $this->authSecret;

                        return $callbackArray;
                    default:
                        throw new OrderException(
                            "Unknown callback authentication grant type '{$this->authGrantType}'."
                            . "Only the following grant types are allowed: ("
                            . implode(', ', self::SUPPORTED_AUTH_GRANT_TYPES) . ")"
                        );

                }
            case self::AUTH_TYPE_NONE:
                return $callbackArray;

            default:
                throw new OrderException("Unknown callback authentication type '{$this->authType}'.");

        }
    }
}
