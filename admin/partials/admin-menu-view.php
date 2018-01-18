<div class="wrap">
	<h1>Breaking News Settings</h1>
</div>
<div class="clear"></div>

<form method="post" action="options.php">
	<?php
	settings_fields( 'social-share-settings' );
	do_settings_sections( 'social-share-settings' );
	submit_button();
	?>
</form>