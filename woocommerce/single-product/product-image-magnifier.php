<?php
/**
 * Single Product Image
 *
 * @author 		YIThemes
 * @package 	YITH_Magnifier/Templates
 * @version     1.1.2
 */

if ( ! defined ( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

global $post, $woocommerce, $product, $is_IE;

$enable_slider = get_option ( 'yith_wcmg_enableslider' ) == 'yes' ? true : false;
$placeholder   = function_exists ( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src () : woocommerce_placeholder_img_src ();

$slider_items = get_option ( 'yith_wcmg_slider_items', 3 );
if ( ! isset( $slider_items ) || ( $slider_items == null ) ) {
    $slider_items = 3;
}
$extra_classes = apply_filters( 'yith_wcmg_single_product_image_extra_classes', array() );
if( is_array( $extra_classes ) ){
    $extra_classes = implode( " ", $extra_classes );
}
?>

<input type="hidden" id="yith_wczm_traffic_light" value="free">

<?php 
$attachment_ids = $product->get_gallery_image_ids();
if ( ! empty( $attachment_ids ) ) {
	$imageclass = 'hasthumb';
} else {
	$imageclass = 'nothumb';
}
?>
<div class="images<?php if($is_IE): ?> ie<?php endif ?> <?php echo esc_attr($imageclass); ?>">

	<?php
    if ( has_post_thumbnail () ) {

        $image       = get_the_post_thumbnail ( $post->ID, apply_filters ( 'single_product_large_thumbnail_size', 'shop_single' ) );
        $image_title = esc_attr ( get_the_title ( get_post_thumbnail_id () ) );
        $image_link  = wp_get_attachment_url ( get_post_thumbnail_id () );
        list( $magnifier_url, $magnifier_width, $magnifier_height ) = wp_get_attachment_image_src ( get_post_thumbnail_id (), "shop_magnifier" );

        echo apply_filters ( 'woocommerce_single_product_image_html', sprintf ( '<a href="%s" itemprop="image" class="yith_magnifier_zoom woocommerce-main-image %s" title="%s">%s</a>', $magnifier_url,$extra_classes, $image_title, $image ), $post->ID );

    } else {
        echo apply_filters ( 'woocommerce_single_product_image_html', sprintf ( '<a href="%s" itemprop="image" class="yith_magnifier_zoom woocommerce-main-image %s"><img src="%s" alt="Placeholder" /></a>', $placeholder, $extra_classes, $placeholder ), $post->ID );
    }
    ?>
    <?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>



<?php echo do_shortcode('[magnifier_image]'); ?>
