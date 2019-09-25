{if $show_toolbar}

{/if}

{foreach from=$ordering_list item=var_name}
    <img src="{$link->getMediaLink("`$module_dir|escape:'htmlall':'UTF-8'`views/img/`$var_name|escape:'htmlall':'UTF-8'`.png")}" alt="{l s='Credit card' mod='pensopay'}" />
{/foreach}