<?php

class Igord_CustomApi_Model_Input_HttpRequestValidator
{
    protected $httpRequest;
    protected $result;
    protected $tokenName = "Bearer";
    protected $minTokenLength = 10;

    public function __construct($httpRequest)
    {
        $this->httpRequest = $httpRequest;
        $this->result = Mage::getModel('customapi/Input_HttpRequestValidator_Result_ResultFactory')->create();
    }

    public function validate()
    {
        $this->validateRequestMethod();
        $this->validateToken();
        $this->validateUriStructure();
        $this->validateBody();
        $this->validateBodyType();
        return $this->result;
    }

    protected function validateRequestMethod()
    {
        if(!$this->httpRequest->isPost())
            $this->setError('Request method must be a POST!');
    }

    protected function validateToken()
    {
        $token = $this->httpRequest->getHeader($this->tokenName);
        if(($token == false) || (empty($token)) || (strlen($token) < $this->minTokenLength) || (!ctype_alnum($token)))
            $this->setError('The Token: ' . $this->tokenName . ' must exist and be a valid!');
        else $this->result->setToken($token);
    }

    protected function validateUriStructure()
    {
        $uri = $this->httpRequest->getRequestUri();
        $pattern = '#^[a-zA-Z]+/v[0-9]/[a-zA-Z/]+$#is';
        if(!preg_match($pattern, $uri))
            $this->setError('The request uri has wrong structure!');
    }

    protected function validateBody()
    {
        if($this->httpRequest->getBody() == false)
            $this->setError('The body of request is empty!');
    }

    protected function validateBodyType()
    {
        $body = $this->httpRequest->getBody();

        if($this->isValidJSON($body))
            $this->result->setBodyType('JSON');
        else if ($this->isValidXml($body))
            $this->result->setBodyType('XML');
        else
            $this->setError('The body must have format: JSON or XML! Unsupported format!');
    }

    protected function setError($message)
    {
        $error = Mage::getModel('customapi/Input_HttpRequestValidator_Result_Error_ErrorFactory')
            ->create($message);
        $this->result->addError($error);
    }

    protected function isValidJSON($string) {
        return ((is_string($string) &&
            (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }

    protected function isValidXml($string)
    {
        $content = trim($string);

        if (empty($string)) {
            return false;
        }

        libxml_use_internal_errors(true);
        simplexml_load_string($content);
        $errors = libxml_get_errors();
        libxml_clear_errors();

        return empty($errors);
    }
}