<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;
use MyPromo\Connect\SDK\Exceptions\InputValidationException;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Validation;

/**
 * Class ProductImportInput
 * @package MyPromo\Connect\SDK\Models
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
    protected $https_basic_auth_user;

    /**
     * @var string|null
     */
    protected $https_basic_auth_password;

    /**
     * @var array|null
     */
    protected $https_header;

    /**
     * @var array|null
     */
    protected $oauth_credentials;

    /**
     * @var array|null
     */
    protected $oauth2_credentials;

    /**
     * @var string|null
     */
    protected $sftp_user;

    /**
     * @var string|null
     */
    protected $sftp_password;

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
        return $this->https_basic_auth_user;
    }

    /**
     * @param string|null $https_basic_auth_user
     */
    public function setHttpsBasicAuthUser(?string $https_basic_auth_user)
    {
        $this->https_basic_auth_user = $https_basic_auth_user;
    }

    /**
     * @return string|null
     */
    public function getHttpsBasicAuthPassword(): ?string
    {
        return $this->https_basic_auth_password;
    }

    /**
     * @param string|null $https_basic_auth_password
     */
    public function setHttpsBasicAuthPassword(?string $https_basic_auth_password)
    {
        $this->https_basic_auth_password = $https_basic_auth_password;
    }

    /**
     * @return array|null
     */
    public function getHttpsHeader(): ?array
    {
        return $this->https_header;
    }

    /**
     * @param array $https_header
     */
    public function setHttpsHeader(array $https_header)
    {
        $validator = Validation::createValidator();

        $constraints = new Collection([
            'key'   => [
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

        $violations = $validator->validate($https_header, $constraints);
        if ($violations->count() > 0) {
            throw new InputValidationException($violations);
        }

        $this->https_header = $https_header;
    }

    /**
     * @return string|null
     */
    public function getSftpUser(): ?string
    {
        return $this->sftp_user;
    }

    /**
     * @param string|null $sftp_user
     */
    public function setSftpUser(?string $sftp_user)
    {
        $this->sftp_user = $sftp_user;
    }

    /**
     * @return string|null
     */
    public function getSftpPassword(): ?string
    {
        return $this->sftp_password;
    }

    /**
     * @param string|null $sftp_password
     */
    public function setSftpPassword(?string $sftp_password)
    {
        $this->sftp_password = $sftp_password;
    }

    /**
     * @return array|null
     */
    public function getOAuthCredenetials(): ?array
    {
        return $this->oauth_credentials;
    }

    /**
     * @param array|null $oauth_credentials
     */
    public function setOAuthCredentials(array $oauth_credentials)
    {
        $this->oauth_credentials = $oauth_credentials;
    }

    /**
     * @return array|null
     */
    public function getOAuth2Credentials(): ?array
    {
        return $this->oauth2_credentials;
    }

    /**
     * @param array|null $oauth2_credentials
     */
    public function setOAuth2Credentials(array $oauth2_credentials)
    {
        $this->oauth2_credentials = $oauth2_credentials;
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
            'url'    => $this->url
        ];

        // Only use credentials if everything isset
        // Credentials will be used in the following order
        // 1. Https basic auth user and password
        // 2. Https basic auth header
        // 3. Sftp user and password
        if (isset($this->https_basic_auth_user) && isset($this->https_basic_auth_password)) {
            $importArray['auth']['basic'] = [
                'username' => $this->https_basic_auth_user,
                'password' => $this->https_basic_auth_password,
            ];
        } elseif (isset($this->https_header)) {
            $importArray['auth']['header'] = $this->https_header;
        } elseif (isset($this->sftp_user) && isset($this->sftp_password)) {
            $importArray['auth']['basic'] = [
                'username' => $this->sftp_user,
                'password' => $this->sftp_password,
            ];
        } else if (isset($this->oauth_credentials)) {
            $importArray['auth']['oauth1'] = $this->oauth_credentials;
        } else if (isset($this->oauth2_credentials)) {
            $importArray['auth']['oauth2'] = $this->oauth2_credentials;
        }

        return $importArray;
    }
}
