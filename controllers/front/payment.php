<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    PensoPay A/S
 *  @copyright 2019 PensoPay
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  E-mail: support@pensopay.com
 */

/**
 * @since 1.5.0
 */
class PensopayPaymentModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $cart_id = Tools::getValue('id_cart');
        $key = Tools::getValue('key');

        if (!$cart_id || !$key) {
            PrestaShopLogger::addLog('PensoPay Payment redirect page called without a key and/or cart', 3);
            Tools::redirect('index.php');
        }

        $cart = new Cart($cart_id);
        if (!$cart->id || $cart->secure_key !== $key) {
            PrestaShopLogger::addLog('PensoPay Payment redirect page called without a valid key and/or cart', 3);
            Tools::redirect('index.php');
        }

        $pensopay = new PensoPay();
        $pensopay->payment();
    }
}
