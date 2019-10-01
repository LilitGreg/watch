<?php /*Template Name: Search Page*/
	get_header();
?>
	<div class="container custom-container search_page woocommerce">
		<ul class="products">
    	<?php
    	//  $loop = new WP_Query( $args );
    	 if(have_posts()){
			$k=0;
			$count = $wp_query->post_count;
    	    while ( have_posts() ) : the_post();
    	    $terms = wp_get_post_terms( $post->ID, 'product_cat');
    	    foreach ($terms as $key => $term) {
    	    	if($term->parent == '0'){
    	    		$post_term = $term->term_id;
    	    	}else{
    	    		$post_term = $term->parent;
    	    	}
    	    }
			$k++;
    	    global $product;
			?>
    	    	<div class="col-md-4 col-sm-4 col-xs-4 item mix  <?php echo 'category-'.$post_term ?>"  data-my-order="<?php echo $post_term ?>" >
					<li>
    		    	<a href="<?php echo get_the_permalink() ?>" title="<?php echo sprintf( __( '%s', 'my_localization_domain' ), get_the_title() )  ?>" >
    		    		<div class='item_content '>
							<?php $price = ($post_term != '') ?  $product->get_price_html() : '' ;?>
    		    			<?php the_post_thumbnail($size = array(510,600), $attr = array('class' => 'img-responsive') ); ?>
    		    			<a href="<?= get_the_permalink(); ?>" title="<?php sprintf( __( '%s', 'my_localization_domain' ), get_the_title() ); ?>">
								<span class="price">
									<?= $price; ?>
								</span>
								<h3 class="item_title"><?= get_the_title() ?></h3>
							</a>
    		    		</div>
    		    	</a>
					</li>
    	    	</div>
		<?php endwhile; ?>


		   <?php if (function_exists("wp_bs_pagination")) {
       	   	    wp_bs_pagination();
       	   	} ?>
    	   <?php wp_reset_query();
    	 }else{
    	 	echo '<p>Search Result:</p>';
    	 	echo "Nothing found with <b><i>".$_GET['s']."</i></b> keyword";
    	 	echo '<br>';
    	 	echo '<hr>';
    	 	echo "Suggestions:";
    	 	echo '<br>';
    	 	echo '<br>';

    	 	echo '<p>-Make sure that all words are spelled correctly<br> -Try different keywords.</p>';

    	 } ?>
	 </ul>


	</div>

<?php get_footer() ?>
