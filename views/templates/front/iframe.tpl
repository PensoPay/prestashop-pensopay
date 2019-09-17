{*
* NOTICE OF LICENSE
* $Date: 2019/09/12 10:40:37 $
* Written by PensoPay ApS
* E-mail: support@pensopay.com
*}
{extends "$layout"}
{block name="content"}
    <section>
        <iframe src="{$src nofilter}" width="100%" height="650" ></iframe>
    </section>
    <script type="text/javascript">
        var poller = setInterval(pollPayment, 5000);

        function pollPayment() {
            jQuery.ajax('{$endpoint nofilter}', {
                success: function (response) {
                    var obj = JSON.parse(response);
                    if (!obj.repeat) {
                        clearInterval(poller);
                    }
                    if (obj.error || obj.success) {
                        document.location = obj.redirect;
                    }
                }
            });
        }
    </script>
{/block}