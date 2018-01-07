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

class Viamo_Test_Block_Adminhtml_Postcode_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            array(
                'id'      => 'edit_form',
                'action'  => $this->getUrl('*/*/save', array('post_zone_id' => $this->getRequest()->getParam('post_zone_id'))),
                'method'  => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset(
            'base_fieldset',
            array(
                'legend' => Mage::helper('viamo_test')->__('General Information'),
            )
        );

        $fieldset->addField(
            'value',
            'text',
            array(
                'label'    => Mage::helper('viamo_test')->__('Value'),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'value',
            )
        );

        $this->_prepareManagerData();

        $fieldset->addField(
            'manager_id',
            'select',
            array(
                'label'    => Mage::helper('viamo_test')->__('Manager'),
                'class'    => 'required-entry',
                'required' => true,
                'values' => Mage::getResourceModel('viamo_test/manager_collection')->toOptionArray(),
                'name'     => 'manager_id',
            )
        );

        $form->setValues($this->_getModel());

        return parent::_prepareForm();
    }

    /**
     *
     */
    protected function _prepareManagerData()
    {
        $model = $this->_getModel();
        $postZoneId = $model->getId();
        /**
         * @var $linkCollection Viamo_Test_Model_Resource_Link_Postcode_Collection
         */
        $linkCollection = Mage::getResourceModel('viamo_test/link_postcode_collection');
        $managerId = $linkCollection->getManagerIdByPostZoneId($postZoneId);
        $model->setData('manager_id', $managerId);

    }

    protected function _getModel()
    {
        return Mage::registry('postcode_data');
    }

}