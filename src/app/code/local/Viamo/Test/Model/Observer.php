<?php

/**
 * Examples
 *
 * PHP Version 5
 *
 * @category  Viamo
 * @package   Viamo_Test
 * @author    Dmitriy Datsenko <info@lotrans.info>
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://github.com/dathent/viamotest
 */

class Viamo_Test_Model_Observer {


    const CONFIG_PATH_DEFAULT_USER = 'viamo_test/configuration/manager_id';

    const CONFIG_PATH_AMOUNT = 'viamo_test/configuration/amount';


    /**
     * Prepare and add manager to order model
     * @param Varien_Event_Observer $observer
     */
    public function managerLinkOrder(Varien_Event_Observer $observer)
    {
        /**
         * @var $order Mage_Sales_Model_Order
         */
        $order = $observer->getData('order');
        $defaultManagerId = Mage::getStoreConfig(self::CONFIG_PATH_DEFAULT_USER);
        $amountForPrepare = Mage::getStoreConfig(self::CONFIG_PATH_AMOUNT);
        $managerName = '';

        $total = $order->getGrandTotal();
        /**
         * @var $shippingAddress Mage_Sales_Model_Order_Address
         */
        $shippingAddress = $order->getShippingAddress();

        $postcode = (is_object($shippingAddress)) ? $shippingAddress->getPostcode() : '000000';

        if($amountForPrepare < $total) {
            /**
             * @var $collectionPostZone Viamo_Test_Model_Resource_Postcode_Collection
             */
            $collectionPostZone = Mage::getResourceModel('viamo_test/postcode_collection');
            $postZoneId = null;
            while ($item = $collectionPostZone->fetchItem()) {
                $value = $item->getValue();
                if(strlen($value) > strlen($postcode) && stristr($value, $postcode)) {
                    $postZoneId = $item->getId();
                    break;
                } elseif(strlen($value) < strlen($postcode) && stristr($postcode, $value)) {
                    $postZoneId = $item->getId();
                    break;
                } elseif(strlen($value) == strlen($postcode) && $value == $postcode){
                    $postZoneId = $item->getId();
                    break;
                }
            }

            if($postZoneId) {
                $managerName = Mage::helper('viamo_test')->getManagerNameByPostZoneId($postZoneId);
            } else {
                $managerName = Mage::getModel('viamo_test/manager')->load($defaultManagerId)->getName();
            }
        }

        $order->setManager($managerName);
    }

}