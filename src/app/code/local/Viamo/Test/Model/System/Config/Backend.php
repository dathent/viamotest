<?php

class Viamo_Test_Model_System_Config_Backend extends Mage_Core_Model_Config_Data
{
    protected function _afterSave()
    {
        parent::_afterSave();
        Mage::app()->getConfig()->cleanCache();
        Mage::getResourceModel('sales/order_collection')->save();
    }
}