<?php
/**
 * Whatsapp Share button. http://kriskbx.github.io/whatsapp-sharing/
 * <a href="whatsapp://send" data-text="Take a look at this awesome website:" data-href="" class="wa_btn wa_btn_s" style="display:none">Share</a>

 * @package    Social_Share\Front\Partials
 */

?>

<a href="whatsapp://send?text=<?php echo esc_url( $current_url ); ?>” data-action=”share/whatsapp/share" target="_blank" class="fa <?php echo esc_html( $size_class ); ?> fa-whatsapp"></a>
