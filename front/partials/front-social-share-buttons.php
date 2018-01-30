<?php
/**
 * Social Share buttons.
 *
 * @var \Social_Share\Front\Front_Settings_Helper $settings
 * @var bool $floating
 * @package    Social_Share\Front\Partials
 */

?>

<?php


require_once plugin_dir_path( __DIR__ ) . 'vendors' . DIRECTORY_SEPARATOR . 'Mobile-Detect' . DIRECTORY_SEPARATOR . 'Mobile_Detect.php';
$detect = new Mobile_Detect();

$current_url = get_permalink();
// If it is medium, leave class by default (there is a social network called Medium.
$size_class = ( $settings->get_size() === 'Medium' ) ? '' : 'fa-' . strtolower( $settings->get_size() );
// If floating, we need to do some calculations to place top dynamically depending of number of social networks and size.
if ( $floating ) {
	$top          = 160;
	$top_increase = 40;
	switch ( $settings->get_size() ) {
		case 'Small':
			$top_increase = 40;
			break;
		case 'Medium':
			$top_increase = 70;
			break;
		case 'Large':
			$top_increase = 70;
			break;
	}
}
?>

<?php if ( $image ) : ?>
	<div class="share-inside">
<?php else : ?>
	<div class="share-buttons">
<?php endif; ?>
		<?php foreach ( $settings->get_available_networks() as $sn_name => $colour ) : ?>
			<?php // If Whatsapp is available but page is not loaded on mobile, skip it. ?>
			<?php if ( 'Whatsapp' === $sn_name && ! $detect->isMobile() ) : ?>
				<?php continue; ?>
			<?php endif; ?>

			<?php // If floating, we need to wrap it up. ?>
			<?php if ( $floating ) : ?>
				<div style="top: <?php echo esc_html( $top ); ?>px" class="fa-float float-<?php echo esc_html( strtolower( $sn_name ) ); ?>">
					<?php require plugin_dir_path( __FILE__ ) . 'front-social-share-' . strtolower( $sn_name ) . '-button.php'; ?>
				</div>
				<?php $top = $top + $top_increase; ?>
			<?php elseif ( $image ) : ?>
				<div class="fa-inside inside-<?php echo esc_html( strtolower( $sn_name ) ); ?>">
					<?php require plugin_dir_path( __FILE__ ) . 'front-social-share-' . strtolower( $sn_name ) . '-button.php'; ?>
				</div>
			<?php else : ?>
				<?php require plugin_dir_path( __FILE__ ) . 'front-social-share-' . strtolower( $sn_name ) . '-button.php'; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
