<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<media:thumbnail url="http://anyurl.com/thumbnailname.jpg" width="150" height="150"/>
		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>
        <header class="header" id="masthead">
          <div class="header-top clearfix" id="header-top">
						<div class="container">

          	 <div class="col-md-5 col-sm-5 col-xs-12">
							 <div class="row">

                <ul class="list-inline">

									<?php

								    	if(is_user_logged_in()) { ?>
												<li> 	<a  href="<?php echo wp_logout_url( home_url() ); ?> "> Logout</a> 	</li>

											<?php	} else { ?>

												<li>  <a href="/watch/login/">  Login </a> </li>

											<?php } ?>


                	 <!-- <li>  <a href="login/">  Login </a> </li> -->
										<li> Not a Member?  <a href="register/"> <span class="colored">  Sign Up </span> </a> </li>
										<li> <a href="mailto:support@yourdomain.com"> <?php  echo get_theme_mod( 'email', 'No copyright information has been saved yet.' );  ?></a> </li>
                </ul>

							 </div>
          	 </div>

						 <div class="col-md-7 col-sm-7 col-xs-12 top-bar-right">
							 <div class="row">

                   <ul class="list-inline">
												<?php   extra_nav(array('header-menu' => 'menu', 'container' => '', 'menu_class'  => ''));  ?>
                   </ul>

								</div>
          	 </div>

					 </div>
          </div>
           <div class="container wrap clearfix">
						 <div class="row">

						 <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="row">

                  <form role="search" class="header_container input-group search_box" action="<?php echo esc_url( home_url( '/' ) ); ?>"  method="get" id="advanced-searchform" >
                      <input type="text" name="s" class="form-control" placeholder="What are you looking?" value="<?php echo  isset($_GET['s']) ? $_GET['s'] : '' ?>">
                        <input type="submit" value=" ">
                  </form>


							</div>

						 </div>
             <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="row">
                    <a  href="<?php echo home_url(); ?>">
                         <img  class="logo"  src="<?php  echo get_theme_mod( 'img-upload', 'No copyright information has been saved yet.' );?>" alt="">
                     </a>
                  </div>
             </div>

						 <div class="col-md-2 col-sm-2 col-xs-12">


							<?php
								if(is_user_logged_in()) {
								//	if (current_user_can('manage_options') ){
									global $current_user;
									//get_currentuserinfo();
									//echo '<div class="clearfix top_report"><p class="customer-name col-hell">Hello '. $current_user->display_name.'!</p>';
									//echo '<ul class="col-log">';

									 if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

											$count = WC()->cart->cart_contents_count;



											echo '<a  class="btn btn-theme-transparent items-checkout" href="#">

											<i class="fa fa-shopping-cart"></i>


											<span>'; echo  $count;   echo ' item(s) </span> </a>';  ?>
									<?php } ?>


								  <?php	echo "</div> </div></div>";
							//	}
							}
								else{
									echo '<ul class="logout-list">';

									if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

										 $count = WC()->cart->cart_contents_count;

										 echo '<a  class="btn btn-theme-transparent items-checkout">

										 <i class="fa fa-shopping-cart"></i>

										 <span>'; echo  $count;   echo ' item(s) </span> </a>';

										 //echo '<li class="cart_link"> <a  href="';  echo WC()->cart->get_cart_url(); echo '"> Cart(<span>'; echo  $count;  echo ') </span> </a>    </li>';  ?>
								 <?php }

									 echo  '</ul>';

								} ?>


							<!---cart item-place---->

							<div class="cart-items">
									<div class="cart-items-inner">

									<?php
										foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
											$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
											$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

											if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
												$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
												?>
												<div class="woocommerce-cart-form__cart-item clearfix <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


													<div class="product-thumbnail">
													<?php
													$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

													if ( ! $product_permalink ) {
														echo wp_kses_post( $thumbnail );
													} else {
														printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
													}
													?>
													</div>

													<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
													<?php
													if ( ! $product_permalink ) {
														echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
													} else {
														echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
													}

													do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

													// Meta data.
													echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

													// Backorder notification.
													if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
														echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>' ) );
													}
													?>
													</div>

													<div class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
														<?php
															echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
														?>
													</div>

												</div>
												<?php
											}
										} ?>

										<?php
											/**
											 * Cart collaterals hook.
											 *
											 * @hooked woocommerce_cross_sell_display
											 * @hooked woocommerce_cart_totals - 10
											 */
											do_action( 'woocommerce_cart_collaterals' );
										?>


									</div>
							</div>


						 </div>
	        </div>

           </div>

					 <div class="container-fluid navigation-wrapper">
							<div class="row">
								<nav id="navbar" class="navbar">
									 <?php   watch_nav(array('header-menu' => 'menu', 'container' => '', 'menu_class'  => ''));  ?>
							 </nav>


							<div class="dropdown colap_menu">
								<a class="dropdown-toggle" id="menutog" data-toggle="dropdown" aria-haspopup="true"
									 aria-expanded="false">
									<span>
											 <i class="fa fa-bars"></i>
									</span>
								</a>
								<div class="dropdown-menu dd_menu" aria-labelledby="dropdownMenuButton">
										<?php   watch_nav(array('header-menu' => 'menu', 'container' => '', 'menu_class'  => '')); ?>
								</div>
						</div>

		   	  </div>
				</div>

    </header>
