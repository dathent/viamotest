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

class Viamo_Test_Block_Adminhtml_Manager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('managerGrid');
        $this->setDefaultSort('name');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }
    /**
     * Prepare grid collection object
     *
     * @return Viamo_Test_Block_Adminhtml_Manager_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('viamo_test/manager_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    /**
     * Prepare grid columns
     *
     * @return Viamo_Test_Block_Adminhtml_Manager_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'manager_id',
            array(
                'type'     => 'number',
                'header'   => Mage::helper('examples_admingridandform')->__('ID'),
                'width'    => '50px',
                'index'    => 'manager_id',
                'sortable' => true,
            )
        );
        $this->addColumn(
            'name',
            array(
                'header' => Mage::helper('examples_admingridandform')->__('Name'),
                'width'  => '400px',
                'index'  => 'name',
            )
        );

        return parent::_prepareColumns();
    }
    /**
     * Return a URL to be used for each row
     *
     * If you don't wish rows to return a URL, simply omit this method
     *
     * @param Varien_Object $row The row for which to supply a URL
     *
     * @return string The row URL
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
    /**
     * Prepare grid mass actions
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('manager_id');
        $this->getMassactionBlock()->setFormFieldName('manager');
        $this->getMassactionBlock()->addItem(
            'delete',
            array(
                'label'   => Mage::helper('viamo_test')->__('Delete'),
                'url'     => $this->getUrl('*/*/massDelete'),
                'confirm' => Mage::helper('viamo_test')->__('Are you sure?')
            )
        );
        return $this;
    }
}