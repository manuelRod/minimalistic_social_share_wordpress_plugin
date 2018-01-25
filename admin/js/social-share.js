/**
 * All dashboard facing js.
 *
 * @package Social_Share\Admin\js
 */

jQuery(
	function () {
		'use strict';
		jQuery( "#sortable" ).sortable(
			{
				revert: true,
				update: function (event, ui) {
					var order = jQuery( '#sortable' ).sortable( 'toArray' ).toString();
					var data  = {
						'action': 'save_sn_order',
						'order': order,
						'nonce': ajax.nonce
					};
					jQuery.post(
						ajax.ajaxurl, data, function (response) {
							if (response != 1) {
								alert( 'something is wrong saving the order, try it later.' )
							}
						}
					);
				}
			}
		);
		jQuery( "ul, li" ).disableSelection();

		jQuery( '.default_colour' ).on(
			'click', function() {
				var id             = this.id;
				var default_colour = jQuery( this ).attr( 'data-defaultcolour' );
				document.getElementsByName( 'social-share-settings[colour][' + id + ']' )[0].value = default_colour;
			}
		);
	}
);
