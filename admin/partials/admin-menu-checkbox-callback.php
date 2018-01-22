<?php
/**
 * Checkbox callback
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */

?>

<table>
	<tr>
		<?php foreach ( $available_types as $cpt ) : ?>
			<?php $checked = ( is_array( $chosen_types ) ) && ( $chosen_types[ $cpt ] ) ? 'checked' : ''; ?>
			<td>
				<input type="checkbox"
					id="<?php echo esc_html( $cpt ); ?>"
					name="social-share-settings[<?php echo esc_html( $option_name ); ?>][<?php echo esc_html( $cpt ); ?>]"
					value="<?php echo esc_html( $cpt ); ?>" <?php echo $checked; ?>><?php echo esc_html( $cpt ); ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>
