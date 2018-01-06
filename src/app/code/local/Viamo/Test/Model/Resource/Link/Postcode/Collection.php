<?php

class Viamo_Test_Model_Resource_Link_Postcode_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Define main table
     *
     */
    protected function _construct()
    {
        $this->_init('viamo_test/manager_post_zone', 'entity_id');
    }
}