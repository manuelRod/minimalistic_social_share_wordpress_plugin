<?php
/**
 * Radio colour
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */

?>

<table>
	<tr>
		<?php foreach ( $available_types as $cpt ) : ?>
			<?php $checked = ( $chosen_types === $cpt ) ? 'checked' : ''; ?>
			<td>
				<input type="radio"
					id="<?php echo esc_html( $cpt ); ?>"
					name="social-share-settings[<?php echo esc_html( $option_name ); ?>]"
					value="<?php echo esc_html( $cpt ); ?>" <?php echo $checked; ?>><?php echo esc_html( $cpt ); ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>
