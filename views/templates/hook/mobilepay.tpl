{*
* NOTICE OF LICENSE
* $Date: 2018/09/15 06:09:27 $
* Written by PensoPay A/S
* E-mail: support@pensopay.com
*}

<br>
<ul class="terms-conditions">
    {foreach from=$conditions_to_approve item="condition" key="condition_name"}
        <li>
            <div class="terms-checkbox">
              <span class="custom-checkbox">
                <input  id    = "conditions_to_approve[{$condition_name}]"
                        name  = "conditions_to_approve[{$condition_name}]"
                        required
                        type  = "checkbox"
                        value = "1"
                        class = "ps-shown-by-js"
                >
                <span><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
              </span>
            </div>
            <div class="condition-label">
                <label class="js-terms" for="conditions_to_approve[{$condition_name}]">
                    {$condition nofilter}
                </label>
            </div>
        </li>
    {/foreach}
</ul>

{if $smarty.const._PS_VERSION_ >= 1.7}
    <button class="btn btn-primary mobilepay-checkout" onclick="window.location.href = '{$payment_url|escape:'javascript':'UTF-8'}';" disabled>
        <span>MobilePay Checkout</span>
    </button>
{else}
<button class="btn btn-default button button-medium mobilepay-checkout" onclick="window.location.href = '{$payment_url|escape:'javascript':'UTF-8'}';" disabled>
    <span>MobilePay Checkout</span>
</button>
{/if}
