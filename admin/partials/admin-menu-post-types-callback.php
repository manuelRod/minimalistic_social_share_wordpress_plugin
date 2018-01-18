<table>
	<tr>
		<?php foreach ( $public_post_types as $key => $cpt ): ?>
			<?php $checked = ( is_array( $chosen_post_types ) ) && ( $chosen_post_types[ $key ] ) ? 'checked' : ''; ?>
			<td>
				<input type="checkbox"
				       id="<?= $key ?>"
				       name="social-share-settings[post_types][<?= $key ?>]"
				       value="<?= $key ?>" <?= $checked ?>><?= $key ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>