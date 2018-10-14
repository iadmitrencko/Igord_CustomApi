<?php

class Igord_CustomApi_Helper_Email extends Mage_Core_Helper_Abstract
{
    /**
     * @param $to
     * @param $fromEmail
     * @param $subject
     * @param $name
     * @param $description
     * @throws Varien_Exception
     * @throws Zend_Mail_Exception
     */
    public function send($to, $fromEmail, $subject, $name, $description)
    {
        $supportMail = (new Zend_Mail('UTF-8'))
            ->addTo($to)
            ->setFrom($fromEmail, $name)
            ->setSubject($subject)
            ->setBodyText($description);

        try {
            $supportMail->send();
        } catch (Exception $e) {
            Mage::getSingleton('core/session')
                ->addError('Error! Cannot send email to support!' . $e->getMessage());
        }
    }
}