<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    PensoPay A/S
 *  @copyright 2015 PensoPay
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  $Date: 2019/01/07 06:37:33 $
 *  E-mail: support@pensopay.com
 */

/**
 * @since 1.5.0
 */
class PensopayPaymentModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $pensopay = new PensoPay();
        $pensopay->payment();
    }
}
