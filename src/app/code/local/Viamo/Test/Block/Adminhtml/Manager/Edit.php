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
        $this->_updateButton('save', 'label', Mage::helper('viamo_test')->__('Save Thing'));
        $this->_updateButton('delete', 'label', Mage::helper('viamo_test')->__('Delete Thing'));

        $this->_addButton(
            'save_and_edit_button',
            array(
                'label'     => Mage::helper('viamo_test')->__('Save and Continue Edit'),
                'onclick'   => 'saveAndContinueEdit()',
                'class'     => 'save'
            ),
            100
        );
    }
    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('manager_data') && Mage::registry('manager_data')->getId() ) {
            return Mage::helper('viamo_test')->__("Edit Thing");
        } else {
            return Mage::helper('viamo_test')->__('Add Thing');
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