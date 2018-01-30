<?php
/**
 * Whatsapp Share button.
 *
 * @package    Social_Share\Front\Partials
 */

?>

<a style="background: <?php echo esc_html( $colour ); ?>" href="whatsapp://send?text=<?php echo esc_url( $current_url ); ?>" data-action="share/whatsapp/share" target="_blank" class="fa <?php echo esc_html( $size_class ); ?> fa-whatsapp"></a>
