<?php

class Igord_CustomApi_Model_Support extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('customapi/support');
    }

    public function addRecord($name, $email, $description, $metadata)
    {
        $this->setName($name)
            ->setEmail($email)
            ->setRequestDescription($description)
            ->setMetadata($metadata)
            ->setCreatedAt(Mage::app()->getLocale()->date());
        $this->save();
    }
}