<?php

class Igord_CustomApi_Model_Resource_Support extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('customapi/support', 'request_id');
    }
}