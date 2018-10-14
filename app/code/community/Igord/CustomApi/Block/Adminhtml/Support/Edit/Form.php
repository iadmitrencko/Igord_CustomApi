<?php

class Igord_CustomApi_Block_Adminhtml_Support_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Igord_CustomApi_Block_Adminhtml_Support_Edit_Form constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('support_form');
        $this->setTitle(Mage::helper('customapi')->__('Send message to support email'));
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $helper = Mage::helper('customapi');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save'),
            'method' => 'post'
        ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('support_form', array('legend' => $helper->__('Message data')));

        $fieldset->addField('name', 'text', array(
            'label' => $helper->__('Name'),
            'required' => true,
            'name' => 'name'
        ));

        $fieldset->addField('email', 'text', array(
            'label' => $helper->__('Email'),
            'required' => true,
            'name' => 'email',
            'class' => 'validate-email'
        ));

        $fieldset->addField('request_description', 'textarea', array(
            'label' => $helper->__('Request description'),
            'required' => true,
            'name' => 'request_description'
        ));

        $form->setUseContainer(true);

        return parent::_prepareForm();
    }
}