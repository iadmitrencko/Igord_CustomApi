<?php

class Igord_CustomApi_TestController extends Mage_Core_Controller_Front_Action
{
    public function igordAction()
    {
        $request = Mage::getModel('customapi/Input_HttpRequest_HttpRequestFactory')->create();
        echo $request->getRequestUri();
    }
}