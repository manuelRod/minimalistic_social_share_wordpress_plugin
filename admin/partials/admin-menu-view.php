<?php
/**
 * Settings area view
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */

?>

<div class="wrap">
	<h1><?php esc_html_e( 'Social Share Settings', 'social-share' ); ?></h1>
</div>
<div class="clear"></div>

<form method="post" action="options.php">
	<?php
	settings_fields( 'social-share-settings' );
	do_settings_sections( 'social-share-settings' );
	submit_button();
	?>
</form>
