{*
* NOTICE OF LICENSE
* $Date: 2018/09/15 05:10:42 $
* Written by PensoPay ApS
* E-mail: support@pensopay.com
*}

<form action="{$payment_url|escape:'javascript':'UTF-8'}" method="post" id="pensopay{$type|escape:'htmlall':'UTF-8'}">
{foreach from=$fields item=field}
	<input type="hidden" name="{$field.name|escape:'htmlall':'UTF-8'}" value="{$field.value|escape:'htmlall':'UTF-8'}" />
{/foreach}
</form>
{if $imgs|@count gt 2}
<p class="payment_module pensopay imgf">
{else}
<p class="payment_module pensopay">
{/if}
	<a style="height:auto" href="javascript:$('#pensopay{$type|escape:'htmlall':'UTF-8'}').submit()">
{foreach from=$imgs item=img}
            <img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/{$img|escape:'htmlall':'UTF-8'}.png" alt="{l s='Pay with credit cards ' mod='pensopay'}" />
{/foreach}
		&nbsp;

		{if isset($type) and $type eq 'viabill' and isset($cart)}
			<div class="viabill-pricetag" data-view="payment" data-price="{$cart.totals.total.amount|escape:'htmlall':'UTF-8'}"></div>
		{/if}
		&nbsp;

		{$text|escape:'htmlall':'UTF-8'}
{if $fees|@count gt 0}
<span style="display:table">
{foreach from=$fees item=fee}
	<span style="display:table-row">
		<span style="display:table-cell">
			<i>
				{$fee.name|escape:'htmlall':'UTF-8'}
			</i>
		</span>
		<span style="display:table-cell">
				{$fee.amount|escape:'htmlall':'UTF-8'}
		</span>
	</span>
{/foreach}
</span>
{/if}
	</a>
</p>
