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

class Viamo_Test_Block_Adminhtml_Manager_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
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
                'action'  => $this->getUrl('*/*/save', array('manager_id' => $this->getRequest()->getParam('manager_id'))),
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
            'name',
            'text',
            array(
                'label'    => Mage::helper('viamo_test')->__('Name'),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'name',
            )
        );

        return parent::_prepareForm();
    }
}