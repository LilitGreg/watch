
<?php
// Creating the widget
class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(

			// Base ID of your widget
			'wpb_widget',

			// Widget name will appear in UI
			__('WidgetText', 'wpb_widget_domain'),
			__('CompText', 'wpb_widget_domain'),



			//__('Company', 'wpb_widget_domain'),

			// Widget description
			array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
		);
	}

	// Creating widget front-end

	public function widget( $args, $instance ) {


		 $categories = get_categories( array(
	    'orderby' => 'name',
	    'order'   => 'ASC'
	     ) );
		  $cat_count = 0;
		  $cat_col_one = [];
		  $cat_col_two = [];

		//echo '<div class="col-md-12 col-sm-12 col-xs-12">';

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];


      //echo do_shortcode('[woo_products_by_tags tags="top,deal"]');

     $terms = get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false)); ?>
      <ul class="product-tags">
      <?php foreach ( $terms as $term ) {
         if ($term->name = 'top')  { ?>
         <li>   <a href="<?php echo get_term_link( $term->term_id, 'product_tag' ); ?> " rel="tag"><?php echo $term->name; ?></a></li>
      <?php } break; }

      foreach ( $terms as $term ) {
         if ($term->name = 'saleoff')  { ?>
           <li>  <a href="<?php echo get_term_link( $term->term_id, 'product_tag' ); ?> " rel="tag"><?php echo $term->name; ?></a></li>
      <?php } break; }

      foreach ( $terms as $term ) {
         if ($term->name = 'deal')  { ?>
           <li>  <a href="<?php echo get_term_link( $term->term_id, 'product_tag' ); ?> " rel="tag"><?php echo $term->name; ?></a></li>
      <?php } break; } ?>

    </ul>
     <?php ?>

    <div class="content-tags">

      <div class="top-content content-tag">
        <?php    echo do_shortcode('[products tag="top"]'); ?>
      </div>

      <div class="saleoff-content content-tag">
        <?php    echo do_shortcode('[products tag="saleoff"]'); ?>
      </div>

     <div class="deal-content content-tag">
       <?php   echo do_shortcode('[products tag="deal"]'); ?>
     </div>


   </div>

<?php

	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] )  && isset( $instance[ 'logo' ] )) {
			$title = $instance[ 'title' ];
			$logo = $instance[ 'logo'];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
			$logo = __( 'logo', 'wpb_widget_domain' );
		}



    if ( isset( $instance[ 'title_1' ] )  && isset( $instance[ 'logo_1' ] )) {
      $title_1 = $instance[ 'title_1' ];
      $logo_1 = $instance[ 'logo_1'];
    }
    else {
      $title_1 = __( 'New title', 'wpb_widget_domain' );
      $logo_1 = __( 'logo', 'wpb_widget_domain' );
    }
		// Widget admin form
		?>


		<?php  echo do_shortcode('[products tag="top"]') ?>

		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		// $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	  //   $instance['logo'] = ( ! empty( $new_instance['logo'] ) ) ? strip_tags( $new_instance['logo'] ) : '';
    //
    //   $instance['title_1'] = ( ! empty( $new_instance['title_1'] ) ) ? strip_tags( $new_instance['title_1'] ) : '';
    //     $instance['logo_1'] = ( ! empty( $new_instance['logo_1'] ) ) ? strip_tags( $new_instance['logo_1'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here



register_widget( 'wpb_widget' );
