{*
* NOTICE OF LICENSE
* $Date: 2018/09/15 06:09:27 $
* Written by PensoPay ApS
* E-mail: support@pensopay.com
*}

{if $smarty.const._PS_VERSION_ >= 1.7}
<br>
<br>
<a href="{$payment_url|escape:'javascript':'UTF-8'}" class="btn btn-primary">
MobilePay Checkout
</a>
{else}
<a href="{$payment_url|escape:'javascript':'UTF-8'}" class="btn btn-default button button-medium">
<span>
MobilePay Checkout
</span>
</a>
<br>
<br>
{/if}
