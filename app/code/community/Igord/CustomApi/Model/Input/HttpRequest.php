<?php

class Igord_CustomApi_Model_Input_HttpRequest
{
    protected $mageRequest;

    public function __construct($mageRequest)
    {
        $this->mageRequest = $mageRequest;
    }

    public function getRequestUri()
    {
        return trim($this->mageRequest->getRequestUri(), "/");
    }

    public function isPost()
    {
        return $this->mageRequest->isPost();
    }

    public function getBody()
    {
        return $this->mageRequest->getRawBody();
    }

    public function getHeader($header)
    {
        return $this->mageRequest->getHeader($header);
    }
}