{if $linkTitle && $linkHref}
    {assign var="assembled_link" value="<a href=\"`$linkHref`\">`$linkTitle`</a>"}
    {$generic|replace:'%link%':$assembled_link nofilter}
{else}
    {$generic|escape:'htmlall':'UTF-8'}
{/if}