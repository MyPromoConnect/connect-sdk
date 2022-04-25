<?php

namespace MyPromo\Connect\SDK;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\ClientException;
use MyPromo\Connect\SDK\Exceptions\GeneralException;
use MyPromo\Connect\SDK\Exceptions\MissingCredentialsException;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\CacheItem;

/**
 * Class Client
 * @package Connect\SDK
 */
class Client
{
    /**
     * Production URL
     */
    const PRODUCTION_URL = 'https://api.mypromo.com/';

    /**
     * Sandbox URL
     */
    const SANDBOX_URL = 'https://sandbox.api.mypromo.com/';

    /**
     * Sandbox URL
     */
    const STAGE_URL = 'https://stage.api.mypromo.com/';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $secret;

    /**
     * Defines if the SDK runs in production, sandbox or staging
     *
     * @var int
     */
    protected $productionCode;

    /**
     * @var FilesystemAdapter
     */
    protected $cache;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * To force SDK for new token
     *
     * @var $forceNewToken
     */
    protected $forceNewToken;

    /**
     * Client constructor.
     *
     * @param int           $productionCode
     * @param int           $id
     * @param string        $secret
     * @param string|null   $baseUri
     * @param bool          $forceNewToken
     */
    public function __construct($productionCode, $id, $secret, $baseUri = null, $forceNewToken = false)
    {
        if (!$baseUri) {
            // Switch through production codes
            // default case should always be the live system
            switch ($productionCode) {
                case 0:
                    $baseUri = self::SANDBOX_URL;
                    break;
                case 1:
                    $baseUri = self::PRODUCTION_URL;
                    break;
                case 2:
                    $baseUri = self::STAGE_URL;
                    break;
                default:
                    $baseUri = self::PRODUCTION_URL;
            }
        }

        $this->cache      = new FilesystemAdapter();
        $this->guzzle     = new \GuzzleHttp\Client([
            'base_uri' => $baseUri,
        ]);
        $this->id               = $id;
        $this->secret           = $secret;
        $this->productionCode   = $productionCode;
        $this->forceNewToken    = $forceNewToken;
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function secret()
    {
        return $this->secret;
    }

    /**
     * @return FilesystemAdapter
     */
    public function cache()
    {
        return $this->cache;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function guzzle()
    {
        return $this->guzzle;
    }

    /**
     * Get token from cache or request bearer token from connect
     *
     * @return CacheItem
     *
     * @throws MissingCredentialsException
     * @throws ClientException|InvalidArgumentException
     */
    public function auth(): CacheItem
    {
        if (!isset($this->id) || !isset($this->secret)) {
            throw new MissingCredentialsException('Missing client id or secret.');
        }

        try {
            $bearerToken = $this->cache->getItem('bearerToken' . $this->id . '-' . $this->secret);

            if (!$bearerToken->isHit() || $this->forceNewToken) {
                $response = $this->guzzle->post('/oauth/token', [
                    'headers'            => [
                        'Content-Type' => 'application/json',
                        'Accept'       => 'application/json',
                    ],
                    RequestOptions::JSON => [
                        'grant_type'    => 'client_credentials',
                        'client_id'     => $this->id(),
                        'client_secret' => $this->secret(),
                        'scope'         => '*',
                    ],
                ]);

                if ($response->getStatusCode() !== 200) {
                    throw new ClientException($response->getBody(), $response->getStatusCode());
                }

                $body = json_decode($response->getBody(), true);

                $bearerToken->set($body['access_token']);
                $bearerToken->expiresAfter($body['expires_in']);
                $this->cache->save($bearerToken);
            }
        } catch (GuzzleException $ex) {
            throw new ClientException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new ClientException($ex->getMessage(), $ex->getCode());
        }

        return $bearerToken;
    }

    /**
     * @return array
     *
     * @throws ClientException|InvalidArgumentException
     */
    public function status(): array
    {
        try {
            $response = $this->guzzle->get('/v1/status', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ClientException($response->getBody(), $response->getStatusCode());
            }
        } catch (GuzzleException $ex) {
            throw new ClientException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new ClientException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }
}
