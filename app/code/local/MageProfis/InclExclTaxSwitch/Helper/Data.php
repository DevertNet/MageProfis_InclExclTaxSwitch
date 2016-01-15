<?php
class MageProfis_InclExclTaxSwitch_Helper_Data extends Mage_Core_Helper_Abstract
{
    /*
     * $url = Mage::helper('inclexcltaxswitch')->getSwitchUrlExclTax();   
     */
    public function getSwitchUrlInclTax()
    {
        return $this->buildUrl('brutto', 'netto');
    }
    
    public function getSwitchUrlExclTax()
    {
        return $this->buildUrl('netto',  'brutto');
    }
    
    public function buildUrl( $parameter, $parameter_remove )
    {
        $url = Mage::helper('core/url')->getCurrentUrl();

        $url_parts = parse_url($url);
        $params = array();
        if( array_key_exists('query', $url_parts) ) parse_str($url_parts['query'], $params);
        $params[ (string)$parameter ] = '';
        unset( $params[ (string)$parameter_remove ] );
        $url_parts['query'] = http_build_query($params);
        
        return $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'] . '?' . $url_parts['query'];
    }
}