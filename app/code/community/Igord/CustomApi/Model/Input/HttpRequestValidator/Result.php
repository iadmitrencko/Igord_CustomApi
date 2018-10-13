<?php

class Igord_CustomApi_Model_Input_HttpRequestValidator_Result
{
    protected $errors = [];

    protected $bodyType;

    public function addError(Igord_CustomApi_Model_Input_HttpRequestValidator_Result_Error $error)
    {
        $this->errors[] = $error;
    }

    public function hasError()
    {
        if(empty($this->errors))
            return false;
        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setBodyType($bodyType)
    {
        $this->bodyType = $bodyType;
    }

    public function getBodyType()
    {
        return $this->bodyType;
    }
}