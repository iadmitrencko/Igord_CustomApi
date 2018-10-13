<?php

class Igord_CustomApi_Model_Input_HttpRequestValidator_Result_ErrorFactory
{
    public function create($message)
    {
        return Mage::getModel('customapi/Input_HttpRequestValidator_Result_Error', $message);
    }
}