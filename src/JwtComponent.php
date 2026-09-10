<?php

declare(strict_types=1);

namespace YiiJwtAuthKeys;

use CApplicationComponent;
use fidelize\JwtAuthKeys\JwtAuth;

class JwtComponent extends CApplicationComponent
{
    public ?string $secret = null;
    public ?string $keysDirectory = null;

    protected ?JwtAuth $jwtAuth = null;

    public function init(): void
    {
        $this->jwtAuth = new JwtAuth();

        if ($this->secret !== null) {
            $this->jwtAuth->setSecret($this->secret);
        }

        if ($this->keysDirectory !== null) {
            $this->jwtAuth->setKeysDirectory($this->keysDirectory);
        }

        parent::init();
    }

    /**
     * @param array<string, mixed>|string $payload
     */
    public function encode(array|string $payload): string
    {
        return $this->getJwtAuth()->encode($payload);
    }

    public function decode(string $msg): mixed
    {
        return $this->getJwtAuth()->decode($msg);
    }

    protected function getJwtAuth(): JwtAuth
    {
        if ($this->jwtAuth === null) {
            throw new \RuntimeException('JwtAuth is not initialized.');
        }

        return $this->jwtAuth;
    }
}
