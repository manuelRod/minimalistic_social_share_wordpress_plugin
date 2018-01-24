<?php
/**
 * Radio colour
 *
 * @package Social_Share\Admin\Partials
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
					value="<?php echo esc_html( $cpt ); ?>" <?php echo esc_html( $checked ); ?>><?php echo esc_html( $cpt ); ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>
