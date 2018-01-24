<?php
/**
 * Checkbox callback
 *
 * @package Social_Share\Admin\Partials
 */

?>

<table>
	<tr>
		<?php foreach ( $available_types as $cpt ) : ?>
			<?php $checked = ( is_array( $chosen_types ) ) && ( isset( $chosen_types[ $cpt ] ) ) ? 'checked' : ''; ?>
			<td>
				<input type="checkbox"
					id="<?php echo esc_html( $cpt ); ?>"
					name="social-share-settings[<?php echo esc_html( $option_name ); ?>][<?php echo esc_html( $cpt ); ?>]"
					value="<?php echo esc_html( $cpt ); ?>" <?php echo esc_html( $checked ); ?>><?php echo esc_html( $cpt ); ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>
