<table>
	<tr>
		<?php foreach ( $available_types as $cpt ): ?>
			<?php $checked = ( $chosen_types == $cpt) ? 'checked' : ''; ?>
			<td>
				<input type="radio"
				       id="<?= $cpt ?>"
				       name="social-share-settings[<?= $option_name ?>]"
				       value="<?= $cpt ?>" <?= $checked ?>><?= $cpt ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>