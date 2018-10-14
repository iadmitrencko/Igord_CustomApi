<?php

class Igord_CustomApi_Adminhtml_SupportController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('customapi');
        $this->_addContent($this->getLayout()->createBlock('customapi/adminhtml_support_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $metadata = Mage::helper('customapi')->getMetadata();

                $emailTo = Mage::helper('customapi')->getSupportEmail();
                $subject = Mage::helper('customapi')->__('To support');

                Mage::getModel('customapi/support')
                    ->addRecord($data['name'], $data['email'], $data['request_description'], $metadata);

                Mage::helper('customapi/email')
                    ->send($emailTo, $data['email'], $subject, $data['name'], $data['request_description']);

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Message sent successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');

            } catch (Exception $exception) {
                Mage::getSingleton('adminhtml/session')->addError($exception->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/');
            }
        }

        Mage::getSingleton('adminhtml/session')->addError($this->__('Failed to send message'));
        $this->_redirect('*/*/');
    }
}