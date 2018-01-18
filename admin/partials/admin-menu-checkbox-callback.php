<table>
	<tr>
		<?php foreach ( $available_types as $key => $cpt ): ?>
			<?php $checked = ( is_array( $chosen_types ) ) && ( $chosen_types[ $key ] ) ? 'checked' : ''; ?>
			<td>
				<input type="checkbox"
				       id="<?= $key ?>"
				       name="social-share-settings[<?= $option_name ?>][<?= $key ?>]"
				       value="<?= $key ?>" <?= $checked ?>><?= $key ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>