<?php
/**
 * Twitter Share button.
 *
 * @package    Social_Share\Front\Partials
 */

?>

<a style="background: <?php echo esc_html( $colour ); ?>" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" class="fa <?php echo esc_html( $size_class ); ?> fa-pinterest"></a>

