<?php

class Igord_CustomApi_Model_Input_HttpRequestValidator_HttpRequestValidatorFactory
{
    public function create($request)
    {
        return Mage::getModel('customapi/Input_HttpRequestValidator', $request);
    }
}