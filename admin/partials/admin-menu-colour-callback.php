<table>
	<tr>
		<?php foreach ( $available_types as $cpt ): ?>
			<?php
			$colour_value = ( $chosen_types[$cpt] ) ? $chosen_types[$cpt] : '#ff0000'; ?>
			<td>
				<input type="color"
				       id="<?= $cpt ?>"
				       name="social-share-settings[<?= $option_name ?>][<?= $cpt ?>]"
				       value="<?= $colour_value ?>"><?= $cpt ?>
			</td>
		<?php endforeach; ?>
	</tr>
</table>