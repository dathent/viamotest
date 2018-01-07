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

class Viamo_Test_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{
    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        /**
         * @var $managerCollection Viamo_Test_Model_Resource_Manager_Collection
         */
        $managerCollection = Mage::getResourceSingleton('viamo_test/manager_collection');
        $managerArray = $managerCollection->toOptionHash();

        $this->addColumn('manager', array(
            'header' => Mage::helper('sales')->__('Manager'),
            'index' => 'manager',
            'type'  => 'options',
            'width' => '70px',
            'options' => $managerArray,
        ));
        return $this;
    }

}
