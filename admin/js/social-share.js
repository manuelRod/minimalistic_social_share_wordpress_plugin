jQuery(function () {
    jQuery("#sortable").sortable({
        revert: true,
        update: function (event, ui) {
            var order = jQuery('#sortable').sortable('toArray').toString();
            var data = {
                'action': 'save_sn_order',
                'order': order,
                'nonce': ajax.nonce
            };
            console.log(ajax);
            console.log(data);
            jQuery.post(ajax.ajaxurl, data, function (response) {
                alert("Response: " + response);
            });
        }
    });
    jQuery("ul, li").disableSelection();
});
