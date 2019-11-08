<?php

namespace MyPromo\Connect\SDK;

use MyPromo\Connect\SDK\Exceptions\ClientException;
use MyPromo\Connect\SDK\Exceptions\MissingCredentialsException;
use GuzzleHttp\RequestOptions;
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
    const PRODUCTION_URL = 'https://connect.mypromo.com';

    /**
     * Sandbox URL
     */
    const SANDBOX_URL = 'https://sandbox.connect.mypromo.com';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $secret;

    /**
     * Defines if the SDK runs in production or sandbox
     *
     * @var bool
     */
    protected $production;

    /**
     * @var FilesystemAdapter
     */
    protected $cache;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * Client constructor.
     *
     * @param bool   $production
     * @param int    $id
     * @param string $secret
     */
    public function __construct($production, $id, $secret)
    {
        $this->cache      = new FilesystemAdapter();
        $this->guzzle     = new \GuzzleHttp\Client([
            'base_uri' => $production ? self::PRODUCTION_URL : self::SANDBOX_URL,
        ]);
        $this->id         = $id;
        $this->secret     = $secret;
        $this->production = $production;
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
     * @throws ClientException
     * @throws InvalidArgumentException
     */
    public function auth()
    {
        if (!isset($this->id) || !isset($this->secret)) {
            throw new MissingCredentialsException('Missing client id or secret.');
        }

        $bearerToken = $this->cache->getItem('bearerToken' . $this->id . '-' . $this->secret);

        if (!$bearerToken->isHit()) {
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

        return $bearerToken;
    }

    /**
     * @return array
     *
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws InvalidArgumentException
     */
    public function status()
    {
        $response = $this->guzzle->get('/v1/status', [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->auth()->get(),
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new ClientException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }
}
