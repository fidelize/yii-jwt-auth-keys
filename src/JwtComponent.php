<?php 

namespace YiiJwtAuthKeys;

use fidelize\JwtAuthKeys\JwtAuth;

class JwtComponent extends \CApplicationComponent 
{
    public $secret;
    public $keysDirectory;
    protected $jwtAuth;

    public function init()
    {
        $this->jwtAuth = new JwtAuth();
        $this->jwtAuth->setSecret($this->secret);
        $this->jwtAuth->setKeysDirectory($this->keysDirectory);
        
        parent::init();
    }

    public function encode($payload)
    {
        return $this->jwtAuth->encode($payload);
    }

    public function decode($msg)
    {
        return $this->jwtAuth->decode($msg);
    }

}