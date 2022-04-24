<?php

namespace MyPromo\Connect\SDK\Helpers;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\OrderException;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Validation;

/**
 * Class ProductImportInput
 * @package MyPromo\Connect\SDK\Helpers
 */
class ProductImportInput implements Arrayable
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string|null
     */
    protected $httpsBasicAuthUser;

    /**
     * @var string|null
     */
    protected $httpsBasicAuthPassword;

    /**
     * @var array|null
     */
    protected $httpsHeader;

    /**
     * @var array|null
     */
    protected $oauthCredentials;

    /**
     * @var array|null
     */
    protected $oauth2Credentials;

    /**
     * @var string|null
     */
    protected $sftpUser;

    /**
     * @var string|null
     */
    protected $sftpPassword;

    /**
     * @var string
     */
    protected $format;

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string|null
     */
    public function getHttpsBasicAuthUser(): ?string
    {
        return $this->httpsBasicAuthUser;
    }

    /**
     * @param string|null $httpsBasicAuthUser
     */
    public function setHttpsBasicAuthUser(?string $httpsBasicAuthUser)
    {
        $this->httpsBasicAuthUser = $httpsBasicAuthUser;
    }

    /**
     * @return string|null
     */
    public function getHttpsBasicAuthPassword(): ?string
    {
        return $this->httpsBasicAuthPassword;
    }

    /**
     * @param string|null $httpsBasicAuthPassword
     */
    public function setHttpsBasicAuthPassword(?string $httpsBasicAuthPassword)
    {
        $this->httpsBasicAuthPassword = $httpsBasicAuthPassword;
    }

    /**
     * @return array|null
     */
    public function getHttpsHeader(): ?array
    {
        return $this->httpsHeader;
    }

    /**
     * @param array $httpsHeader
     * @throws OrderException
     */
    public function setHttpsHeader(array $httpsHeader)
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

        $violations = $validator->validate($httpsHeader, $constraints);
        if ($violations->count() > 0) {
            throw new OrderException($violations);
        }

        $this->httpsHeader = $httpsHeader;
    }

    /**
     * @return string|null
     */
    public function getSftpUser(): ?string
    {
        return $this->sftpUser;
    }

    /**
     * @param string|null $sftpUser
     */
    public function setSftpUser(?string $sftpUser)
    {
        $this->sftpUser = $sftpUser;
    }

    /**
     * @return string|null
     */
    public function getSftpPassword(): ?string
    {
        return $this->sftpPassword;
    }

    /**
     * @param string|null $sftpPassword
     */
    public function setSftpPassword(?string $sftpPassword)
    {
        $this->sftpPassword = $sftpPassword;
    }

    /**
     * @return array|null
     */
    public function getOAuthCredenetials(): ?array
    {
        return $this->oauthCredentials;
    }

    /**
     * @param array|null $oauthCredentials
     */
    public function setOAuthCredentials(array $oauthCredentials)
    {
        $this->oauthCredentials = $oauthCredentials;
    }

    /**
     * @return array|null
     */
    public function getOAuth2Credentials(): ?array
    {
        return $this->oauth2Credentials;
    }

    /**
     * @param array|null $oauth2Credentials
     */
    public function setOAuth2Credentials(array $oauth2Credentials)
    {
        $this->oauth2Credentials = $oauth2Credentials;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $importArray = [
            'format' => $this->format,
            'url' => $this->url
        ];

        // Only use credentials if everything isset
        // Credentials will be used in the following order
        // 1. Https basic auth user and password
        // 2. Https basic auth header
        // 3. Sftp user and password
        if (isset($this->httpsBasicAuthUser) && isset($this->httpsBasicAuthPassword)) {
            $importArray['auth']['basic'] = [
                'username' => $this->httpsBasicAuthUser,
                'password' => $this->httpsBasicAuthPassword,
            ];
        } elseif (isset($this->httpsHeader)) {
            $importArray['auth']['header'] = $this->httpsHeader;
        } elseif (isset($this->sftpUser) && isset($this->sftpPassword)) {
            $importArray['auth']['basic'] = [
                'username' => $this->sftpUser,
                'password' => $this->sftpPassword,
            ];
        } else if (isset($this->oauthCredentials)) {
            $importArray['auth']['oauth1'] = $this->oauthCredentials;
        } else if (isset($this->oauth2Credentials)) {
            $importArray['auth']['oauth2'] = $this->oauth2Credentials;
        }

        return $importArray;
    }
}
