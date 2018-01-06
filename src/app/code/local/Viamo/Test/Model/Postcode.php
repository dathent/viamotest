<?php

class Viamo_Test_Model_Postcode extends Mage_Core_Model_Abstract
{

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'viamo_test_post_zone';

    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init('viamo_test/post_zone');
    }
}