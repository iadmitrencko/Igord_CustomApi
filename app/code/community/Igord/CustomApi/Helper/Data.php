<?php

class Igord_CustomApi_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @var string
     */
    protected $supportEmailPath = 'customapi/support/email';

    /**
     * @var string
     */
    protected $supportOldRequestDays = 'customapi/support/clear_old/days';

    /**
     * @return Mage_Core_Model_Config_Element
     */
    public function getSupportEmail()
    {
        return Mage::getConfig()->getNode($this->supportEmailPath);
    }

    /**
     * @return Mage_Core_Model_Config_Element
     */
    public function getSupportOldRequestDays()
    {
        return Mage::getConfig()->getNode($this->supportOldRequestDays);
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        $request = Mage::app()->getRequest();

        $metaData = array(
            'user_agent' => $request->getHeader('User-Agent'),
            'referer' => $request->getHeader('Referer')
        );

        return json_encode($metaData);
    }
}