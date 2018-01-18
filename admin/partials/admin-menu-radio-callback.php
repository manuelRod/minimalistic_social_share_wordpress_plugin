<table>
	<tr>
		<?php foreach ( $available_types as $key => $cpt ): ?>
			<?php $checked = ( is_array( $chosen_types ) ) && ( $chosen_types[ $key ] ) ? 'checked' : ''; ?>
			<td>
				<input type="radio"
				       id="<?= $key ?>"
				       name="social-share-settings[<?= $option_name ?>]"
				       value="<?= $key ?>" <?= $checked ?>><?= $key ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>