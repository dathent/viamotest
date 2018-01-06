<?php

class Viamo_Test_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{


    protected function _prepareCollection()
    {
         parent::_prepareCollection();
         $collection = $this->getCollection();
        /**
         * TODO need add logick
         */
         return $collection;
    }

    protected function _prepareColumns()
    {
        parent::_prepareColumns();
        /**
         * TODO need add logick
         */
        return $this;
    }

}
