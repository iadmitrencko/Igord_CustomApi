<?php

class Igord_CustomApi_Model_Resource_Support extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('customapi/support', 'request_id');
    }
}