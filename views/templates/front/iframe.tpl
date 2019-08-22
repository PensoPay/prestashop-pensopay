{extends "$layout"}
{block name="content"}
    <section>
        <iframe src="{$src}" width="100%" height="650" ></iframe>
    </section>
    <script type="text/javascript">
        var poller = setInterval(pollPayment, 5000);

        function pollPayment() {
            jQuery.ajax('{$endpoint}', {
                success: function(response) {
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