<?php

class Igord_CustomApi_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $supportEmailPath = "customapi/support/email";

    protected $supportOldRequestDays = "customapi/support/clear_old/days";

    public function getSupportEmail()
    {
        return Mage::getConfig()->getNode($this->supportEmailPath);
    }

    public function getSupportOldRequestDays()
    {
        return Mage::getConfig()->getNode($this->supportOldRequestDays);
    }
}