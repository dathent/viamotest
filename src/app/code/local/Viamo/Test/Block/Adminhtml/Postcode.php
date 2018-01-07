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
class Viamo_Test_Block_Adminhtml_Postcode extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_postcode';
        $this->_blockGroup = 'viamo_test';
        $this->_headerText = Mage::helper('viamo_test')->__('Postcode');
        $this->_addButtonLabel = Mage::helper('viamo_test')->__('Add New Postcode');
        parent::__construct();
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

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/edit');
    }
}
