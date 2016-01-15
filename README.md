# MageProfis_InclExclTaxSwitch

Switch frontend prices incl/excl tax with a URL parameter. (Session based)   
Incl. Tax: ```example.com/demo.html?brutto```   
Excl. Tax: ```example.com/demo.html?netto```

Default state will be set here:  
```Magento Admin > System > Configuration > Tax > Display Price > Catalog prices include tax```


### Compatible with
  - FireGento_MageSetup
  - FireGento_GermanSetup


### Frontend Switch Example:
```html
<?php $priceDisplayType = Mage::getModel('tax/config')->getPriceDisplayType() ?>
<div class="grid-full">
    <div class="inclexcltaxswitch <?php echo $priceDisplayType==2 ? 'incl' : 'excl' ?>">
        <div class="inclexcltaxswitch-label">
            <?php echo $this->__('Alle Preise') ?>
        </div>
        <div class="inclexcltaxswitch-switch">
            <a href="#" rel="nofollow" onclick="window.location.href = updateUrlParameter(window.location.href, 'netto', 'brutto'); return false;" class="<?php echo $priceDisplayType==1 ? 'active' : '' ?>"><?php echo $this->__('zzgl. Ust.') ?></a>
        </div>
        <div class="inclexcltaxswitch-switch">
            <a href="#" rel="nofollow" onclick="window.location.href = updateUrlParameter(window.location.href, 'brutto', 'netto'); return false;" class="<?php echo $priceDisplayType==2 ? 'active' : '' ?>"><?php echo $this->__('incl. Ust.') ?></a>
        </div>
    </div>
    <script>
        function updateUrlParameter(uri, key, removekey) {
            uri = uri.replace("?"+removekey+"=", "?");
            uri = uri.replace("?"+removekey+"", "?");
            uri = uri.replace("&"+removekey+"=", "");
            uri = uri.replace("&"+removekey+"", "");
            uri = uri.replace("?"+key+"=", "?");
            uri = uri.replace("?"+key+"", "?");
            uri = uri.replace("&"+key+"=", "");
            uri = uri.replace("&"+key+"", "");
            // remove the hash part before operating on the uri
            var i = uri.indexOf('#');
            var hash = i === -1 ? ''  : uri.substr(i);
                 uri = i === -1 ? uri : uri.substr(0, i);

            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";
            if (uri.match(re)) {
                uri = uri.replace(re, '$1' + key + "=" + value + '$2');
            } else {
                uri = uri + separator + key;
            }
            uri = uri.replace("?&", "?");
            return uri + hash;  // finally append the hash as well
        }
    </script>
</div>
```

### Todo
- Optimizing JavaScript code
- On/Off System Configuration