<?php
/**
 * Colours callback
 *
 * @package Social_Share\Admin\Partials
 */

?>

<table>
	<tr>
		<?php foreach ( $available_types as $cpt => $colour ) : ?>
			<td>
				<input type="color"
					id="<?php echo esc_html( $cpt ); ?>"
					name="social-share-settings[<?php echo esc_html( $option_name ); ?>][<?php echo esc_html( $cpt ); ?>]"
					value="<?php echo esc_html( $colour ); ?>"><?php echo esc_html( $cpt ); ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>
