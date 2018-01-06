<?php

class Viamo_Test_Model_Link_Postcode extends Mage_Core_Model_Abstract
{

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'viamo_test_manager_post_zone';

    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init('viamo_test/manager_post_zone');
    }
}