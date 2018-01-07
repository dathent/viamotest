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

class Viamo_Test_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * @param $postZoneId
     * @return mixed
     */
    public function getManagerNameByPostZoneId($postZoneId)
    {
        /**
         * @var $collectionLinkPostcode Viamo_Test_Model_Resource_Link_Postcode_Collection
         */
        $collectionLinkPostcode = Mage::getResourceModel('viamo_test/link_postcode_collection');
        $collectionLinkPostcode->addFieldToFilter('post_zone_id', $postZoneId);
        $firstItem = $collectionLinkPostcode->getFirstItem();
        $managerId = $firstItem->getManagerId();
        return Mage::getModel('viamo_test/manager')->load($managerId)->getName();
    }
}