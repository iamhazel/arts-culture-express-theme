<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $woocommerce;

$variations = $product->get_available_variations();
// print("<pre>".print_r($variation,true)."</pre>");

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>

<div class="card m-2" style="width: 20rem;">
    <img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h6 class="card-title"><?php echo( $product->get_name() ); ?></h6>
        <p class="card-text"><?php echo( $product->get_description() ); ?></p>
        
        <div>
            <label class="visually-hidden" for="inlineFormSelectPref">Date</label>
            <select class="form-select form-select" type="number" id="inlineFormSelectPref" name="ticket-quantity-<?php echo($variation['variation_id']) ?>">
                <option selected>Date</option>
                
                <?php foreach ( $variations as $variation ) : $date_stripped = strip_tags( $variation['variation_description'] ); ?>
                <option value="<?php echo($variation['variation_id']) ?>"><?php echo $date_stripped ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="input-group my-3">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" placeholder="Price" aria-label="Price"
                name="ticket-price-<?php echo($variation['variation_id']) ?>">

            <label class="visually-hidden" for="inlineFormSelectPref">TicketCount</label>
            <select class="form-select form-select" type="number" id="inlineFormSelectPref"
                name="ticket-quantity-<?php echo($variation['variation_id']) ?>">
                <option selected disabled>Quantity</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="1">6</option>
            </select>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a class="btn btn-link mr-md-2" type="link" href="<?php echo $product->get_permalink() ?>">Read More</a>
            <button class="btn btn-primary" type="submit" name="add-to-cart-<?php echo($variation['variation_id']) ?>">Add to Cart</button>
        </div>
    </div>
</div>