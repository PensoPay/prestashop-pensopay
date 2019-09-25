<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    PensoPay A/S
 *  @copyright 2015 PensoPay
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  E-mail: support@pensopay.com
 */

/**
 * @since 1.5.0
 */
class PensopayIframeresponseModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        $context = Context::getContext();
        $mode = Tools::getValue(PensoPay::MODE_VARIABLE);
        if ($mode == PensoPay::MODE_CANCEL) {
            $context->cookie->__set(PensoPay::COOKIE_ORDER_CANCELLED, '1');
            $context->cookie->write();
        }
        if (defined('_TB_VERSION_')) {
            echo 'Please wait...';
        } else {
            echo $this->l('Please wait...');
        }
        exit;
    }
}
