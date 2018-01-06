<?php

class Viamo_Test_Model_Manager extends Mage_Core_Model_Abstract
{

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'viamo_test_manage';

    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init('viamo_test/manage');
    }
}