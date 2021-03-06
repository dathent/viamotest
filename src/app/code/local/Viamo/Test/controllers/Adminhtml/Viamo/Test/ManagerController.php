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

class Viamo_Test_Adminhtml_Viamo_Test_ManagerController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index action - shows the grid
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('viamo_test/manager');
        $this->renderLayout();
    }
    /**
     * Edit action - shows the edit form
     */
    public function editAction()
    {
        $this->_initModel();
        $this->loadLayout();
        $this->_setActiveMenu('viamo_test/manager');
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
     *
     */
    public function saveAction()
    {
        try {
            $data = $this->_prepareData();
            $model = $this->_getModel();
            $model->addData($data)
                ->save();
            $this->_getSession()->addSuccess('Manager is saved.');
            $this->getResponse()->setRedirect($this->getUrl("*/*/index"));
        } catch(Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->getResponse()->setRedirect($this->getUrl("*/*/*"));
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
            $this->_getSession()->addSuccess('Manager is deleted.');
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

        if(isset($data['name'])) {
            $preparedData['name'] = $data['name'];
        } else {
            throw new Exception('Params "name" is required');
        }

        return $preparedData;
    }

    /**
     * @return Viamo_Test_Model_Manager
     */
    protected function _getModel()
    {
        if(!Mage::registry('manager_data')) {
            $managerId = $this->getRequest()->getParam('manager_id');
            /**
             * @var $managerModel Viamo_Test_Model_Manager
             */
            $managerModel = Mage::getModel('viamo_test/manager')->load($managerId);
            Mage::register('manager_data', $managerModel);
        }

        return Mage::registry('manager_data');
    }
}