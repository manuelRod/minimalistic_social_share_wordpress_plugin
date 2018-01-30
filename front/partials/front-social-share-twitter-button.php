<?php
/**
 * Twitter Share button.
 *
 * @package    Social_Share\Front\Partials
 */

?>

<a style="background: <?php echo esc_html( $colour ); ?>" href="https://twitter.com/intent/tweet?url=<?php echo esc_url( $current_url ); ?>" target="_blank" class="fa <?php echo esc_html( $size_class ); ?>  fa-twitter"></a>
