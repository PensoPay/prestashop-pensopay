<?php
/**
 * NOTICE OF LICENSE
 *
 *  @author    PensoPay ApS
 *  @copyright 2015 PensoPay
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *
 *  $Date: 2019/01/07 06:37:33 $
 *  E-mail: support@pensopay.com
 */

/**
 * @since 1.5.0
 */
class PensopayValidationModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $json = Tools::file_get_contents('php://input');
        if (!$json) {
            $json = $GLOBALS['HTTP_RAW_POST_DATA']; // Deprecated since PHP 5.6
        }
        $checksum = $_SERVER['HTTP_QUICKPAY_CHECKSUM_SHA256'];

        $pensopay = new PensoPay();
        $pensopay->validate($json, $checksum);
        exit(0);
    }
}
