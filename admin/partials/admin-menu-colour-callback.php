<?php
/**
 * Colours callback
 *
 * @package Social_Share\Admin\Partials
 */

?>

<table>
	<tr>
		<?php foreach ( $default_colours as $cpt => $colour ) : ?>
			<?php $colour_value = ( isset( $chosen_types[ $cpt ] ) ) ? $chosen_types[ $cpt ] : $colour; ?>
			<td>
				<?php echo esc_html( $cpt ); ?>
				<input type="color"
					id="<?php echo esc_html( $cpt ); ?>"
					name="social-share-settings[<?php echo esc_html( $option_name ); ?>][<?php echo esc_html( $cpt ); ?>]"
					value="<?php echo esc_html( $colour_value ); ?>">
				<span data-defaultcolour="<?php echo esc_html( $colour ); ?>" id="<?php echo esc_html( $cpt ); ?>" class="default_colour">
					Default Colour
				</span>
			</td>
		<?php endforeach; ?>
	</tr>
</table>
