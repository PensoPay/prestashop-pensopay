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
class PensopayCompleteModuleFrontController extends ModuleFrontController
{
    public function init()
    {
        $id_cart = (int)Tools::getValue('id_cart');
        $id_module = (int)Tools::getValue('id_module');

        $key = Tools::getValue('key');
        if (!$id_module || !$key) {
            Tools::redirect('history.php');
        }

        $cart = new Cart($id_cart);
        if (!$cart->id || $cart->secure_key !== $key) {
            Tools::redirect('index.php');
        }

        for ($i = 0; $i < 10; $i++) {
            /* Wait for validation */
            $trans = Db::getInstance()->getRow('SELECT *
                FROM '._DB_PREFIX_.'pensopay_execution
                WHERE `id_cart` = '.$id_cart.'
                ORDER BY `id_cart` ASC');
            if ($trans && $trans['accepted']) {
                break;
            }
            sleep(1);
        }
        $isMobilepayCheckout = false;
        $pensopay = new PensoPay();
        if ($trans && !$trans['accepted']) {
            $setup = $pensopay->getSetup();
            $json = $pensopay->doCurl('payments/'.$trans['trans_id']);
            $vars = $pensopay->jsonDecode($json);
            $isMobilepayCheckout = !empty($vars->link->invoice_address_selection);
            $json = Tools::jsonEncode($vars);
            if ($vars->accepted == 1) {
                $checksum = $pensopay->sign($json, $setup->private_key);
                $pensopay->validate($json, $checksum);
            }
        } else {
            $vars = $pensopay->jsonDecode($trans['json']);
            $isMobilepayCheckout = !empty($vars->link->invoice_address_selection);
        }
        unset($this->context->cookie->id_cart);
        parent::init();
        $id_order = Order::getOrderByCartId($id_cart);
        if (!$id_order) {
            Tools::redirect('history.php');
        }
        $order = new Order($id_order);
        $customer = new Customer($order->id_customer);
        if (!Validate::isLoadedObject($order) ||
                $customer->secure_key != $key) {
            Tools::redirect('history.php');
        }

        if (!$pensopay->isV17() || $isMobilepayCheckout) {
            $cookies = Context::getContext()->cookie;
            $cookies->id_customer = $order->id_customer;
            $cookies->write();
        }

        Tools::redirect(
            'index.php?controller=order-confirmation&id_cart='.$id_cart.
            '&id_module='.$id_module.
            '&id_order='.$id_order.
            '&key='.$key
        );
    }
}
