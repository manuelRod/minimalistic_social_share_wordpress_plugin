<table>
	<tr>
		<?php foreach ( $available_types as $cpt ): ?>
			<?php $checked = ( is_array( $chosen_types ) ) && ( $chosen_types[ $cpt ] ) ? 'checked' : ''; ?>
			<td>
				<input type="checkbox"
				       id="<?= $cpt ?>"
				       name="social-share-settings[<?= $option_name ?>][<?= $cpt ?>]"
				       value="<?= $cpt ?>" <?= $checked ?>><?= $cpt ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>