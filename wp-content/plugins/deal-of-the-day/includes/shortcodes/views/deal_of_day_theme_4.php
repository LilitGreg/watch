<?php
global $dealofday;
$args['post_type'] = 'product';
$args['meta_key'] = 'dod_is_in_dod';
$args['meta_value'] = 'on';
$args['orderby'] = 'menu_order';
$args['order'] = 'ASC';
$dod_custom_css = get_post_meta(get_the_ID(), 'dod_custom_css');
$custom_css = array_shift($dod_custom_css);
$dod_button_text = get_post_meta(get_the_ID(), 'dod_button_text');
$button_text = array_shift($dod_button_text);
$dod_button_background = get_post_meta(get_the_ID(), 'dod_button_background');
$button_background = array_shift($dod_button_background);
$dod_button_txt_color = get_post_meta(get_the_ID(), 'dod_button_txt_color');
$button_txt_color = array_shift($dod_button_txt_color);
$dod_button_width = get_post_meta(get_the_ID(), 'dod_button_width');
$button_width = array_shift($dod_button_width);
$dod_button_height = get_post_meta(get_the_ID(), 'dod_button_height');
$button_height = array_shift($dod_button_height);
if($button_width != ''){
	$button_padding_left_right = $button_width / 3;
} else{
	//setting up defaults
	$button_padding_left_right = 100 / 3;
}

if($button_height != ''){
	$button_padding_top_bottom = $button_height / 3;
} else{
	//setting up defaults
	$button_padding_top_bottom = 20 / 3;
}


?>
<?php if ($custom_css != "") {?>
<style type="text/css">
<?php echo $custom_css;?>
</style>
<?php }?>

<?php if( !empty($button_background) || !empty($button_txt_color) ){ ?>
<style type="text/css">
.deal-buynow a{
	padding: <?php echo $button_padding_top_bottom .'px '. $button_padding_left_right . 'px'; ?>;
	background-color: <?php echo $button_background; ?>;
	border: 0.50px solid <?php echo $button_txt_color; ?>;
}

.deal-buynow a:hover{
	background-color: <?php echo $button_background; ?>;
}

.deal-buynow a .buynow{
	color: <?php echo $button_txt_color; ?>;
	cursor: pointer;
}

label {
	display: inline;
}


</style>
<?php }
?>

<?php
global $dealofday;
add_filter('posts_results', array(&$dealofday, 'order_by_featured'), PHP_INT_MAX, 2);
$the_query = new WP_Query($args);
$loopcounter = 1;
?>

<?php if ($the_query->have_posts()):?>


<script type="text/javascript" src="<?php echo $dealofday->plugin_url()?>/assets/js/frontend/jquery.countdown.js"></script>


<div class="deal-container">
<?php while ($the_query->have_posts()):$the_query->the_post();?>
	<div class="deal-wrapper theme-4">
		
		<script type="text/javascript">
	jQuery(function($){
	$('#clock<?php echo $loopcounter; ?>').countdown('<?php echo date('Y/m/d', strtotime(get_post_meta(get_the_ID(), 'dod_end_date', true))); ?>', function(event) {
  var $this = $(this).html(event.strftime(''
    + '<li><span>%d</span><br> DAYS </li>'
    + '<li class="doots">:</li>'
    + '<li><span>%H</span><br> HOURS </li>'
    + '<li class="doots">:</li>'
    + '<li><span>%M</span><br> MINS </li>'
    + '<li class="doots">:</li>'
    + '<li><span>%S</span><br> SEC </li>'));
});

	})

	

</script>

	<?php if (get_post_meta(get_the_ID(), 'dod_featured_deal', true) == 'Yes') {?>
																		    <img class="featured" src="<?php echo $dealofday::plugin_url();?>/assets/images/icon_featured1.png" alt="">
	<?php }?>

		<div class="deal-image">
																				<div class="img">
	<?php if (has_post_thumbnail()) { ?>
																				<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" ><?php the_post_thumbnail('shop_single');?></a>
	<?php } else {
		echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="%s" />', wc_placeholder_img_src(), __('Placeholder', 'woocommerce')), get_the_ID());
	} ?>
																				</div>
																				
	<div class="deal-countdown">
	<?php
	if (DD_Shortcode_Deal::is_expired(get_post_meta(get_the_ID(), 'dod_end_date', true))) {
		echo '<h3 class="expired">Deal Expired</h3>';
	} else {?>

	<table style="border:0px;">
		
		<tr>
			<td>
				<div class="clockcount"><ul id="clock<?php echo $loopcounter; ?>"></ul></div>
			</td>
		</tr>
		
	</table>

								
								<br>
	<?php }/// end else ?>
	</div>

																			</div>


																			<div class="deal-content">
																				<div class="deal-detail">



																					<?php

																						$_product = wc_get_product( get_the_ID() );

																						?>

																					<div class="deal-price">
																						<h3><?php echo $_product->get_price_html(); ?></h3>

																						

																					</div>

																					<div class="title">
																						<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >
																							<h2><?php the_title();?></h2>
																						</a>
																					</div>

																					<div class="deal-buynow">
																						
																						
<?php


if(isset($button_text) && $button_text != ''){

	$button_text = $button_text;
} else {
	$button_text = 'Buy Now';
}
																			$add_to_cart = false;
 if( $_product->supports( 'ajax_add_to_cart' ) ){
								$add_to_cart = '<a rel="nofollow" href="'. apply_filters( 'add_to_cart_url', esc_url( $_product->add_to_cart_url() ) ) .'" data-quantity="1" data-product_id="'. esc_attr( $_product->get_id() ) .'" class="add_to_cart_button ajax_add_to_cart product_type_simple">'.$button_text.'</a>';
							} else {
								$add_to_cart = '<a rel="nofollow" href="'. apply_filters( 'add_to_cart_url', esc_url( $_product->add_to_cart_url() ) ) .'" data-quantity="1" data-product_id="'. esc_attr( $_product->get_id() ) .'" class="add_to_cart_button product_type_simple">'.$button_text.'</a>';
							}

							echo $add_to_cart;

?>

																								
																					</div>



		</div>
																		
																		</div>
																	
																		</div>

	<?php $loopcounter++; endwhile;?>

</div>


	<!-- enof the loop -->

	<!-- pagination here -->

<?php wp_reset_postdata();?>

<?php else:?>
	<p><?php _e('Sorry, no posts matched your criteria.');?></p>
<?php endif;?>