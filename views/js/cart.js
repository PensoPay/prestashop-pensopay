function handleTerms() {
    var $terms = jQuery('.terms-checkbox input');
    if ($terms.is(':checked')) {
        jQuery('button.mobilepay-checkout').attr('disabled', false);
    } else {
        jQuery('button.mobilepay-checkout').attr('disabled', true);
    }
}

jQuery(document).ready(function() {
    handleTerms();

    var $terms = jQuery('.terms-checkbox input');
    $terms.click(function() {
        handleTerms();
    });
});