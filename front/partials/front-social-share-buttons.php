<?php
/**
 * Social Share buttons.
 *
 * @package    Social_Share\Front\Partials
 */

?>

<div id="share-buttons">
	<?php $current_url = urlencode(get_permalink()); ?>
	<?php // If it is medium, leave class by default (there is a social network called Medium. ?>
	<?php $size_class = ($settings->get_size() === 'Medium') ? '' : 'fa-' . strtolower($settings->get_size()); ?>
	<?php foreach ($settings->get_available_networks() as $sn_name => $colour) : ?>
		<?php require plugin_dir_path( __FILE__ ) . 'front-social-share-' . strtolower($sn_name) .'-button.php';?>
	<?php endforeach;?>
</div>
