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

class Viamo_Test_Block_Adminhtml_Manager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'manager_id';
        $this->_controller = 'viamo_test';
        $this->_blockGroup = 'viamo_test';
        if($this->_getModel()->getId()) {
            $this->_addButton('delete', array(
                'label'   => Mage::helper('viamo_test')->__('Delete Manager'),
                'onclick' => 'deleteConfirm(\''
                    . Mage::helper('core')->jsQuoteEscape(
                        Mage::helper('viamo_test')->__('Are you sure you want to do this?')
                    )
                    . '\', \''
                    . Mage::helper('adminhtml')->getUrl('*/*/delete', array('manager_id' => $this->_getModel()->getId()))
                    . '\')',
                'class'   => 'scalable delete',
                'level'   => -1
            ));
        }
        $this->_updateButton('save', 'label', Mage::helper('viamo_test')->__('Save Manager'));
    }

    /**
     * @return Viamo_Test_Model_Manager
     */
    protected function _getModel()
    {
        return Mage::registry('manager_data');
    }

    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('manager_data') && Mage::registry('manager_data')->getId() ) {
            return Mage::helper('viamo_test')->__("Edit Manager");
        } else {
            return Mage::helper('viamo_test')->__('Add Manager');
        }
    }
    /**
     * Header CSS class
     *
     * Used to set the icon next to the header text, not at all needed but a
     * nice touch. Look at all the headers to see the available icons, or make
     * your own by omitting this and making a CSS rule for .head-adminhtml-thing
     *
     * @return string The CSS class
     */
    public function getHeaderCssClass()
    {
        return 'icon-head head-cms-page';
    }
}