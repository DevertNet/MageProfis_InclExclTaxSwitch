<?php
class MageProfis_InclExclTaxSwitch_Block_Germansetup_Catalog_Product_Price extends FireGento_GermanSetup_Block_Catalog_Product_Price
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
    public function isIncludingTax()
    {
        $session = Mage::getSingleton("core/session",  array("name"=>"frontend"));
        $showincl = $session->getData("inclexcltaxswitch_showincl");
        $val = 1;
        
        if ( $showincl===true ) {
            $val = 2;
        }elseif ( $showincl===false ) {
            $val = 1;
        }else{
            $val = Mage::getStoreConfig('tax/display/type');
        }
        
        if (!$this->getData('is_including_tax')) {
            $this->setData('is_including_tax', $val);
        }

        return $this->getData('is_including_tax');
    }
}