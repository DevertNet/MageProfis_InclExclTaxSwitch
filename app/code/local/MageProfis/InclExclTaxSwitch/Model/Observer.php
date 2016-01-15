<?php
class MageProfis_InclExclTaxSwitch_Model_Observer
{
    public function requestListner($observer)
    { 
        $session = Mage::getSingleton("core/session",  array("name"=>"frontend"));
        $netto = Mage::app()->getRequest()->getParam('netto', false);
        $brutto = Mage::app()->getRequest()->getParam('brutto', false);
        
        if( $netto!==false ){ //...de?netto
            $session->setData("inclexcltaxswitch_showincl", false);
        }else if( $brutto!==false ){ //...de?brutto
            $session->setData("inclexcltaxswitch_showincl", true);
        }
    }
}