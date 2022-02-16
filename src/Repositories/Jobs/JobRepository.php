<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 14:38
 */

namespace MyPromo\Connect\SDK\Repositories\Jobs;

use Exception;
use MyPromo\Connect\SDK\Exceptions\JobException;
use MyPromo\Connect\SDK\Exceptions\MissingCredentialsException;
use MyPromo\Connect\SDK\Repositories\Repository;

class JobRepository extends Repository
{
    /**
     * @return array
     * @throws JobException|MissingCredentialsException
     */
    public function all()
    {
        try {
            $response = $this->client->guzzle()->get('/v1/jobs', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ]
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new JobException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new JobException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $jobId
     *
     * @return array
     * @throws JobException
     * @throws MissingCredentialsException
     */
    public function find($jobId)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/jobs/' . $jobId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new JobException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new JobException($ex->getMessage(), $ex->getCode());
        }
    }
}
