<?php
/**
* NOTICE OF LICENSE
*
*  @author    PensoPay ApS
*  @copyright 2015 PensoPay
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*
*  $Date: 2019/01/07 06:37:29 $
*  E-mail: support@pensopay.com
*/

include dirname(__FILE__).'/../../config/config.inc.php';
include dirname(__FILE__).'/../../init.php';
require_once dirname(__FILE__).'/pensopay.php';

if (_PS_VERSION_ >= '1.5.0.0') {
    die('Bad version');
}

$pensopay = new PensoPay();
$pensopay->payment();
