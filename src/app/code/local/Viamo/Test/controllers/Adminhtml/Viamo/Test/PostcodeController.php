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

class Viamo_Test_Adminhtml_Viamo_Test_PostcodeController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index action - shows the grid
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('viamo_test/postcode');
        $this->renderLayout();
    }
    /**
     * Edit action - shows the edit form
     */
    public function editAction()
    {
        $this->_initModel();
        $this->loadLayout();
        $this->_setActiveMenu('viamo_test/postcode');
        $this->renderLayout();
    }

    /**
     *
     */
    protected function _initModel()
    {
        $this->_getModel();
    }

    /**
     * @return Mage_Core_Controller_Response_Http
     */
    public function saveAction()
    {
        if(!$this->_validateFormKey()) {
            return $this->getResponse()->setRedirect($this->getUrl("*/*/*"));
        }
        try {
            $data = $this->_prepareData();
            $model = $this->_getModel();
            $model->addData($data)
                ->save();
            $this->getResponse()->setRedirect($this->getUrl("*/*/index"));
        } catch(Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            return $this->getResponse()->setRedirect($this->getUrl("*/*/*"));
        }
    }

    /**
     *
     */
    public function deleteAction()
    {
        try {
            $model = $this->_getModel();
            $model->delete();
            $this->_getSession()->addSuccess('Post Zone is deleted.');
            $this->getResponse()->setRedirect($this->getUrl("*/*/index"));
        } catch(Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->getResponse()->setRedirect($this->getUrl("*/*/*"));
        }
    }

    /**
     * @return array
     * @throws Exception
     */
    protected function _prepareData()
    {
        $data = $this->getRequest()->getParams();
        $preparedData = array();

        if(isset($data['value'])) {
            $preparedData['value'] = $data['value'];
        } else {
            throw new Exception('Params "value" is required');
        }

        if(isset($data['manager_id'])) {
            $postZoneId = $this->_getModel()->getId();
            $managerId = $data['manager_id'];
            /**
             * @var $collectionLink Viamo_Test_Model_Resource_Link_Postcode_Collection
             */
            $collectionLink = Mage::getResourceModel('viamo_test/link_postcode_collection');
            $collectionLink
                ->addFieldToFilter('manager_id', $managerId)
                ->addFieldToFilter('post_zone_id', $postZoneId);
            if($collectionLink->getSize() < 1) {
                $collectionLink->getNewEmptyItem()
                    ->addData(array('manager_id' => $managerId, 'post_zone_id' => $postZoneId))
                    ->save();
            }
        }

        return $preparedData;
    }

    /**
     * @return Viamo_Test_Model_Postcode
     */
    protected function _getModel()
    {
        if(!Mage::registry('postcode_data')) {
            $postZoneId = $this->getRequest()->getParam('post_zone_id');
            /**
             * @var $managerModel Viamo_Test_Model_Postcode
             */
            $postcodeModel = Mage::getModel('viamo_test/postcode')->load($postZoneId);
            Mage::register('postcode_data', $postcodeModel);
        }

        return Mage::registry('postcode_data');
    }
}