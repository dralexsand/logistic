<?php

namespace App\Services\Dadata;

class DadataCredentialService
{
    protected string $dadataApiKey;
    protected string $dadataSecretKey;

    public function __construct()
    {
        $this->setDadataApiKey(getenv('DADATA_API_KEY'));
        $this->setDadataSecretKey(getenv('DADATA_SECRET_KEY'));
    }

    /**
     * @param string $dadataApiKey
     */
    private function setDadataApiKey(string $dadataApiKey): void
    {
        $this->dadataApiKey = $dadataApiKey;
    }

    /**
     * @param string $dadataSecretKey
     */
    private function setDadataSecretKey(string $dadataSecretKey): void
    {
        $this->dadataSecretKey = $dadataSecretKey;
    }

    /**
     * @return string
     */
    public function getDadataApiKey(): string
    {
        return $this->dadataApiKey;
    }

    /**
     * @return string
     */
    public function getDadataSecretKey(): string
    {
        return $this->dadataSecretKey;
    }


}

