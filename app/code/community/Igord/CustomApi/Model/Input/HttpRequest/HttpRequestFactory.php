<?php

class Igord_CustomApi_Model_Input_HttpRequest_HttpRequestFactory
{
    public function create()
    {
        return Mage::getModel('customapi/Input_HttpRequest', Mage::app()->getRequest());
    }
}