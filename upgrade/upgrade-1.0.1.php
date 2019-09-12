<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    PensoPay ApS
 *  @copyright 2015 PensoPay
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  $Date: 2019/01/14 21:29:48 $
 *  E-mail: support@pensopay.com
 */

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
