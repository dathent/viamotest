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


    public function managerLinkOrder(Varien_Event_Observer $observer)
    {
        /**
         * @var $order Mage_Sales_Model_Order
         */
        $order = $observer->getData('order');
    }

}