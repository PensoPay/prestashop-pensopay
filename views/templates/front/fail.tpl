{*
* NOTICE OF LICENSE
* $Date: 2016/02/02 11:50:13 $
* Written by PensoPay ApS
* E-mail: support@pensopay.com
*}

{if $status == 'currency'}
<p class="alert alert-warning warning">{l s='Your order on' mod='pensopay'} <strong>{$shop_name|escape:'htmlall':'UTF-8'}</strong> {l s='failed because the currency was changed.' mod='pensopay'}
</p>
<div class="box">
	{l s='Please fill the cart again.' mod='pensopay'}
	<br /><br />{l s='For any questions or for further information, please contact our' mod='pensopay'} <a href="{$base_dir_ssl|escape:'htmlall':'UTF-8'}contact-form.php">{l s='customer support' mod='pensopay'}</a>.
</div>
{/if}

{if $status == 'test'}
<p class="alert alert-warning warning">{l s='Your order on' mod='pensopay'} <strong>{$shop_name|escape:'htmlall':'UTF-8'}</strong> {l s='failed because a test card was used for payment.' mod='pensopay'}
</p>
<div class="box">
	{l s='Please fill the cart again.' mod='pensopay'}
	<br /><br />{l s='For any questions or for further information, please contact our' mod='pensopay'} <a href="{$base_dir_ssl|escape:'htmlall':'UTF-8'}contact-form.php">{l s='customer support' mod='pensopay'}</a>.
</div>
{/if}
