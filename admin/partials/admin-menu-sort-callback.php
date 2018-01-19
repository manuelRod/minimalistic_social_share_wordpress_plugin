<?php
var_dump($available_types);
var_dump('--------------------');
var_dump($chosen_types);
//die;

?>

<ul id="sortable">
	<?php foreach ( $available_types as $cpt ): ?>
	<li class="ui-state-default" id="<?= $cpt ?>">
	<?php $checked = ( is_array( $chosen_types ) ) && ( $chosen_types[ $cpt ] ) ? 'checked' : ''; ?>
	<?php $value = ( $checked ) ? $cpt : 'notChecked'; ?>
			<input type="checkbox"
			       id="<?= $cpt ?>"
			       name="social-share-settings[<?= $option_name ?>][<?= $cpt ?>]"
			       value="<?= $value ?>" <?= $checked ?>><?= $cpt ?>
	</li>
	<?php endforeach; ?>
</ul>


