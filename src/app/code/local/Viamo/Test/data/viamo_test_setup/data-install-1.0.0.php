<?php
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */
$installer = $this;

$data = array(
    array("post_zone"=>"GU1 1","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU1 2","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU1 3","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU1 4","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU1 9","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU10 1","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU10 2","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU10 3","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU10 4","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU10 5","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU11 1","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU11 2","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU11 3","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU11 9","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU12 4","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU12 5","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU12 6","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU14 0","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU14 4","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU14 6","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU14 7","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU14 8","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU14 9","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU15 1","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU15 2","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU15 3","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU15 4","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU15 9","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU16 6","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU16 7","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU16 8","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU16 9","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU17 0","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU17 9","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU18 5","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU19 5","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU2 4","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU2 7","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU2 8","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU2 9","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU20 6","manager_name"=>"Dave Lister"),
    array("post_zone"=>"GU21 2","manager_name"=>"Arnold Rimmer"),
    array("post_zone"=>"GU21 3","manager_name"=>"Arthur Dent"),
    array("post_zone"=>"GU21 4","manager_name"=>"Ford Prefect"),
    array("post_zone"=>"GU21 5","manager_name"=>"Dave Lister"),
);

foreach ($data as $link) {
    $postZone = (isset($link['post_zone'])) ? $link['post_zone'] : '';
    $managerName = (isset($link['manager_name'])) ? $link['manager_name'] : '';
    /**
     * @var $postZoneModel Viamo_Test_Model_Postcode
     */
    $postZoneModel = Mage::getModel('viamo_test/postcode');
    $postZoneModel->load($postZone, 'value');
    if(!$postZoneModel->getId()) {
        $postZoneModel
            ->setData('value', $postZone)
            ->save();
    }
    $postCodeId = $postZoneModel->getId();

    /**
     * @var $managerModel Viamo_Test_Model_Manager
     */
    $managerModel = Mage::getModel('viamo_test/manager');
    $managerModel->load($managerName, 'name');
    if(!$managerModel->getId()) {
        $managerModel
            ->setData('name', $managerName)
            ->setData('created_at', now())
            ->setData('updated_at', now())
            ->save();
    }
    $managerId = $managerModel->getId();

    /**
     * @var $collectionLinkPostCode Viamo_Test_Model_Resource_Link_Postcode_Collection
     */
    $collectionLinkPostCode = Mage::getResourceModel('viamo_test/link_postcode_collection');
    $firstItem = $collectionLinkPostCode
        ->addFieldToFilter('manager_id', $managerId)
        ->addFieldToFilter('post_zone_id', $postCodeId)
        ->getFirstItem();
    if(!$firstItem->getId()) {
        $firstItem
            ->setData('manager_id', $managerId)
            ->setData('post_zone_id', $postCodeId)
            ->save();
    }
}
/**
 * @var $orderCollection Mage_Sales_Model_Resource_Order_Collection
 */
$orderCollection = Mage::getResourceModel('sales/order_collection');

/**
 * @var $observer Viamo_Test_Model_Observer
 */
$observer = Mage::getSingleton('viamo_test/observer');

while ($order = $orderCollection->fetchItem()) {
    $order->save();
}
