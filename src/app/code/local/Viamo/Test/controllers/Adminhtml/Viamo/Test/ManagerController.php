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
        $this->_setActiveMenu('viamo_test/item');
        $this->renderLayout();
    }
    /**
     * Edit action - shows the edit form
     */
    public function editAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('viamo_test/item');
        $this->renderLayout();
    }
}