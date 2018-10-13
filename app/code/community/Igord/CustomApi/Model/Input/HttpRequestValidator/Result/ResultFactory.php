<?php

class Igord_CustomApi_Model_Input_HttpRequestValidator_Result_ResultFactory
{
    public function create()
    {
        return Mage::getModel('customapi/Input_HttpRequestValidator_Result');
    }
}