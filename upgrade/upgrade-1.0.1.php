<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_0_1($module)
{
    Hook::registerHook($module, 'displayProductPriceBlock', null);
    Hook::registerHook($module, 'displayHeader', null);
    Hook::registerHook($module, 'displayExpressCheckout', null); //we need this for viabill now
    return true;
}
