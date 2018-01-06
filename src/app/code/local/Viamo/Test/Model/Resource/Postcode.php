<?php

class Viamo_Test_Model_Resource_Postcode extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Define main table
     *
     */
    protected function _construct()
    {
        $this->_init('viamo_test/post_zone', 'post_zone_id');
    }
}