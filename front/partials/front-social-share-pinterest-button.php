<?php
/**
 * Pinterest Share button.
 *
 * @package    Social_Share\Front\Partials
 */

?>

<?php
$thumb_to_pin = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
$thumb_to_pin = ( $thumb_to_pin ) ? $thumb_to_pin[0] : '';

?>
<a target="_blank" style="background: <?php echo esc_html( $colour ); ?>" href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( $current_url ); ?>&media=<?php echo esc_url( $thumb_to_pin ); ?>" class="fa <?php echo esc_html( $size_class ); ?> fa-pinterest"></a>

