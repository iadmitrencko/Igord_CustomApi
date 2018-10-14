<?php

class Igord_CustomApi_Model_Authentication
{
    /**
     * @var string
     */
    protected $token;

    /**
     * Igord_CustomApi_Model_Authentication constructor.
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Check if token exist in DB
     * @return bool
     */
    public function check()
    {
        $result = Mage::getModel('customapi/token')
            ->getCollection()
            ->addFieldToFilter('token_value', ['eq' => $this->token]);

        if($result->Count())
            return true;

        return false;
    }
}