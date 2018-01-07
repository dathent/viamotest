<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

if($installer->tableExists($installer->getTable('viamo_test/manager'))){
    $installer->getConnection()->dropTable($installer->getTable('viamo_test/manager'));
}

/**
 * Create table 'viamo_test/manager'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('viamo_test/manager'))
    ->addColumn('manager_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Manager ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Name')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Creation Time')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Update Time')
    ->setComment('Viamo Test Manager');
$installer->getConnection()->createTable($table);



/**
 * Create table viamo_test/post_zone'
 */

if($installer->tableExists($installer->getTable('viamo_test/post_zone'))){
    $installer->getConnection()->dropTable($installer->getTable('viamo_test/post_zone'));
}
$table = $installer->getConnection()
    ->newTable($installer->getTable('viamo_test/post_zone'))
    ->addColumn('post_zone_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Post Zone ID')
    ->addColumn('value', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        ), 'Value')
    ->setComment('Viamo Test Post Zone');
$installer->getConnection()->createTable($table);

/**
 * Create table 'viamo_test/manager_post_zone'
 */

if($installer->tableExists($installer->getTable('viamo_test/manager_post_zone'))){
    $installer->getConnection()->dropTable($installer->getTable('viamo_test/manager_post_zone'));
}
$table = $installer->getConnection()
    ->newTable($installer->getTable('viamo_test/manager_post_zone'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Entity ID')
    ->addColumn('manager_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        ), 'Manager ID')
    ->addColumn('post_zone_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        ), 'Post Zone ID')
    ->addForeignKey($installer->getFkName('viamo_test/manager', 'manager_id', 'viamo_test/manager_post_zone', 'manager_id'),
        'manager_id', $installer->getTable('viamo_test/manager'), 'manager_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addForeignKey($installer->getFkName('viamo_test/post_zone', 'post_zone_id', 'viamo_test/manager_post_zone', 'post_zone_id'),
        'post_zone_id', $installer->getTable('viamo_test/post_zone'), 'post_zone_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Viamo Test Manager Post Zone');
$installer->getConnection()->createTable($table);

/**
 * Create table 'viamo_test/manager_order'
 */
if($installer->tableExists($installer->getTable('viamo_test/manager_order'))){
    $installer->getConnection()->dropTable($installer->getTable('viamo_test/manager_order'));
}
$table = $installer->getConnection()
    ->newTable($installer->getTable('viamo_test/manager_order'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Entity ID')
    ->addColumn('manager_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true
    ), 'Manager ID')
    ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
    ), 'Order Id')
    ->addForeignKey($installer->getFkName('viamo_test/manager_order', 'order_id', 'sales/order', 'entity_id'),
        'order_id', $installer->getTable('sales/order'), 'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addForeignKey($installer->getFkName('viamo_test/manager_order', 'manager_id', 'viamo_test/manager', 'manager_id'),
        'manager_id', $installer->getTable('viamo_test/manager'), 'manager_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Viamo Test Manager Order');
$installer->getConnection()->createTable($table);

$salesOrderTables = array('sales/order', 'sales/order_grid');

foreach ($salesOrderTables as $tableName) {
    $installer->getConnection()->addColumn($installer->getTable($tableName), 'manager', array(
        'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
        'comment' => 'Manager Name'
    ));
}

$installer->endSetup();

