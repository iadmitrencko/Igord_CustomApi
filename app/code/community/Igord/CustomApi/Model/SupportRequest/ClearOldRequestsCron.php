<?php

class Igord_CustomApi_Model_SupportRequest_ClearOldRequestsCron
{
    public function clear()
    {
        $days = Mage::helper('customapi')->getSupportOldRequestDays();
        $date = new DateTime("-$days days");
        $formatDate = $date->format('Y-m-d');

        $supportRequests = Mage::getModel('customapi/support')
            ->getCollection()
            ->addFieldToFilter('created_at', array('lt' => $formatDate));

        if($supportRequests->Count()) {
            foreach ($supportRequests as $supportRequest) {
                $request = Mage::getModel('customapi/support');
                $request->load($supportRequest->getId());
                $request->delete();
            }
        }
    }
}