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

class Viamo_Test_Block_Adminhtml_Postcode_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'post_zone_id';
        $this->_controller = 'viamo_test';
        $this->_blockGroup = 'viamo_test';
        $this->_updateButton('save', 'label', Mage::helper('viamo_test')->__('Save Postcode'));
        if($this->_getModel()->getId()) {
            $this->_addButton('delete', array(
                'label'   => Mage::helper('viamo_test')->__('Delete Postcode'),
                'onclick' => 'deleteConfirm(\''
                    . Mage::helper('core')->jsQuoteEscape(
                        Mage::helper('viamo_test')->__('Are you sure you want to do this?')
                    )
                    . '\', \''
                    . Mage::helper('adminhtml')->getUrl('*/*/delete', array('post_zone_id' => $this->_getModel()->getId()))
                    . '\')',
                'class'   => 'scalable delete',
                'level'   => -1
            ));
        }
    }

    /**
     * @return Viamo_Test_Model_Postcode
     */
    protected function _getModel()
    {
        return Mage::registry('postcode_data');
    }
    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('postcode_data') && Mage::registry('postcode_data')->getId() ) {
            return Mage::helper('viamo_test')->__("Edit Postcode");
        } else {
            return Mage::helper('viamo_test')->__('Add Postcode');
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