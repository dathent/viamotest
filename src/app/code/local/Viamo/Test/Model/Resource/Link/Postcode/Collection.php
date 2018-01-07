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

class Viamo_Test_Model_Resource_Link_Postcode_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Define main table
     *
     */
    protected function _construct()
    {
        $this->_init('viamo_test/link_postcode');
    }

    public function getIdsPostcodeByManager($managerId)
    {
        $this->addFieldToFilter('manager_id', $managerId);
        $select = $this->getSelect();
        $select->reset('columns');
        $select->setPart('columns', array(array(
            'main_table',
            'post_zone_id',
            null
        )));
        $result = $this->getConnection()->fetchCol($select);
        return $result;
    }


    public function getManagerIdByPostZoneId($postZoneId)
    {
        $this->addFieldToFilter('post_zone_id', $postZoneId);
        $select = $this->getSelect();
        $select->reset('columns');
        $select->setPart('columns', array(array(
            'main_table',
            'manager_id',
            null
        )));
        $result = $this->getConnection()->fetchOne($select);
        return $result;
    }

}