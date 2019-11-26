<?php
class MageProfis_InclExclTaxSwitch_Model_Tax_Config extends Mage_Tax_Model_Config
{
    /**
     * Get product price display type
     *  1 - Excluding tax
     *  2 - Including tax
     *  3 - Both
     *
     * @param   mixed $store
     * @return  int
     */
    public function getPriceDisplayType($store = null)
    {
        $session = Mage::getSingleton("core/session");
        $showincl = $session->getData("inclexcltaxswitch_showincl");
        
        if ( $showincl===true ) {
            return 2;
        }elseif ( $showincl===false ) {
            return 1;
        }else{
            return (int)$this->_getStoreConfig(self::CONFIG_XML_PATH_PRICE_DISPLAY_TYPE, $store);
        }
    }
}
