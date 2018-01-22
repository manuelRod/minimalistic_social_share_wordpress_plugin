<?php
/**
 * Settings area view
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */

?>

<ul id="sortable">
	<?php foreach ( $sorted_types as $cpt ) : ?>
	<li class="ui-state-default" id="<?php echo esc_html( $cpt ); ?>">
	<?php $checked = ( is_array( $selected_types ) ) && ( $selected_types[ $cpt ] ) ? 'checked' : ''; ?>
	<?php $value   = ( $checked ) ? $cpt : 'notChecked'; ?>
			<input type="checkbox"
				id="<?php echo esc_html( $cpt ); ?>"
				name="social-share-settings[<?php echo esc_html( $option_name ); ?>][<?php echo esc_html( $cpt ); ?>]"
				value="<?php echo esc_html( $value ); ?>" <?php echo $checked; ?>><?php echo esc_html( $cpt ); ?>
	</li>
	<?php endforeach; ?>
</ul>


