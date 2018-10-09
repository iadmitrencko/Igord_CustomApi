<?php
/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
    ->newTable($this->getTable('customapi/support'))
    ->addColumn('request_id',Varien_Db_Ddl_Table::TYPE_INTEGER,null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true
    ), 'Support Request Id')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 40, array(
        'nullable'  => false
    ), 'Support Request Sender Name')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(
        'nullable'  => false
    ), 'Support Request From Email')
    ->addColumn('request_description', Varien_Db_Ddl_Table::TYPE_TEXT, 1024, array(
        'nullable'  => false
    ), 'Support Request Description')
    ->addColumn('metadata', Varien_Db_Ddl_Table::TYPE_TEXT, 512, array(
        'nullable'  => false
    ), 'Support Request Metadata')
    ->addColumn('created_at',Varien_Db_Ddl_Table::TYPE_DATETIME,null, array(
        'nullable' => false
    ), 'Support Request Create Data');
$installer->getConnection()->createTable($table);
$installer->endSetup();