<?php

class Igord_CustomApi_Block_Adminhtml_Support_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_controller = 'Adminhtml_Support';
        $this->_blockGroup = 'customapi';
        $this->_headerText = Mage::helper('customapi')->__('Message to support');
        parent::__construct();
        $this->_updateButton('save', 'label', Mage::helper('customapi')->__('Send'));
        $this->_removeButton('delete');
        $this->_removeButton('back');
    }
}