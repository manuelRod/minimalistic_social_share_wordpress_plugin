<?php
/**
 * Settings area view
 *
 * @package    Social_Share\Admin\Partials
 */

?>

<ul id="sortable">
	<?php foreach ( $sorted_types as $cpt ) : ?>
	<li class="sortable-list ui-state-default" id="<?php echo esc_html( $cpt ); ?>">
	<?php $checked = ( is_array( $selected_types ) ) && ( isset( $selected_types[ $cpt ] ) ) ? 'checked' : ''; ?>
	<?php $value   = ( $checked ) ? $cpt : 'notChecked'; ?>
			<input type="checkbox"
				id="<?php echo esc_html( $cpt ); ?>"
				name="social-share-settings[<?php echo esc_html( $option_name ); ?>][<?php echo esc_html( $cpt ); ?>]"
				value="<?php echo esc_html( $value ); ?>" <?php echo esc_html( $checked ); ?>><?php echo esc_html( $cpt ); ?>
	</li>
	<?php endforeach; ?>
</ul>


