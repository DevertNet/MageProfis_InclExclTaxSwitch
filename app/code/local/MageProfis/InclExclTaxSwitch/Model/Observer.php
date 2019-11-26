<?php
class MageProfis_InclExclTaxSwitch_Model_Observer
{
    public function requestListner($observer)
    {
        $netto = Mage::app()->getRequest()->getParam('netto', false);
        $brutto = Mage::app()->getRequest()->getParam('brutto', false);
        
        if( $netto!==false ){ //...de?netto
            $session = $this->_session();
            $session->setData("inclexcltaxswitch_showincl", false);
        }else if( $brutto!==false ){ //...de?brutto
            $session = $this->_session();
            $session->setData("inclexcltaxswitch_showincl", true);
        }
    }
    
    protected function _session()
    {
        return Mage::getSingleton("core/session");
    }
}
