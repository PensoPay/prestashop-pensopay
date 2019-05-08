{*
* NOTICE OF LICENSE
* $Date: 2018/09/15 05:10:42 $
* Written by PensoPay ApS
* E-mail: support@pensopay.com
*}

<center class="pensopay imgf">
{foreach from=$ordering_list item=var_name}
  <img src="{$link->getMediaLink("`$module_dir|escape:'htmlall':'UTF-8'`views/img/`$var_name|escape:'htmlall':'UTF-8'`.png")}" alt="{l s='Pay with credit cards ' mod='pensopay'}" />
{/foreach}
</center><br />
