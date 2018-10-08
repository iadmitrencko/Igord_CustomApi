<?php
/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($this->getTable('customapi/customapi_support_request'))
    ->addColumn('request_id',Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true
    ), 'Support Request Id')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(
        'nullable'  => false
    ), 'Support Request Email')
    ->addColumn('request_body', Varien_Db_Ddl_Table::TYPE_TEXT, 1024, array(
        'nullable'  => false
    ), 'Support Request Body')
    ->addColumn('metadata', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false
    ), 'Support Request Metadata')
    ->addColumn('created_at',Varien_Db_Ddl_Table::TYPE_DATETIME,null,array(
        'nullable' => false
    ), 'Suppert Request Create Data');

$installer->getConnection()->createTable($table);
$installer->endSetup();