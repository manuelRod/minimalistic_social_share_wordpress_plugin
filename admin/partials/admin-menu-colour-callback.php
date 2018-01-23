<?php
/**
 * Colours callback
 *
 * @package Social_Share\Admin\Partials
 */

?>

<table>
	<tr>
		<?php foreach ( $available_types as $cpt ) : ?>
			<?php
			$colour_value = ( $chosen_types[ $cpt ] ) ? $chosen_types[ $cpt ] : '#ff0000';
			?>
			<td>
				<input type="color"
					id="<?php echo esc_html( $cpt ); ?>"
					name="social-share-settings[<?php echo esc_html( $option_name ); ?>][<?php echo esc_html( $cpt ); ?>]"
					value="<?php echo esc_html( $colour_value ); ?>"><?php echo esc_html( $cpt ); ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>
