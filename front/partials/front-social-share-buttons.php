<?php
/**
 * Social Share buttons.
 *
 * @package    Social_Share\Front\Partials
 */

?>

<?php
$current_url = rawurlencode( get_permalink() );
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

<div id="share-buttons">
	<?php foreach ( $settings->get_available_networks() as $sn_name => $colour ) : ?>
		<?php // If floating, we need to wrap it up. ?>
		<?php if ( $floating ) : ?>
			<div style="top: <?php echo esc_html( $top ); ?>px" class="fa-float float-<?php echo esc_html( strtolower( $sn_name ) ); ?>">
				<?php require plugin_dir_path( __FILE__ ) . 'front-social-share-' . strtolower( $sn_name ) . '-button.php'; ?>
			</div>
			<?php $top = $top + $top_increase; ?>
		<?php else : ?>
			<?php require plugin_dir_path( __FILE__ ) . 'front-social-share-' . strtolower( $sn_name ) . '-button.php'; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
