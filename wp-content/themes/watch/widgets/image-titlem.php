
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



		$title = apply_filters( 'widget_title', $instance['title'] );
    $logo = apply_filters( 'widget_title', $instance['logo'] );


     $title_1 = apply_filters( 'widget_title_1', $instance['title_1'] );
     $logo_1 = apply_filters( 'widget_title_1', $instance['logo_1'] );


		 $categories = get_categories( array(
	    'orderby' => 'name',
	    'order'   => 'ASC'
	     ) );
		  $cat_count = 0;
		  $cat_col_one = [];
		  $cat_col_two = [];

		echo '<div class="col-md-4 col-sm-4 col-xs-12">';

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) ||  ! empty( $logo )) {
			 echo $args['before_title'] ."<a href='$logo'>" ."Upload image" . "</a>" . $args['after_title'];
			 echo $args['before_title'] . $title . $args['after_title'];

		}


	if ( ! empty( $title_1 ) ||  ! empty( $logo_1 )) {
     echo $args['before_title'] ."<a href='$logo_1'>" ."Upload image" . "</a>" . $args['after_title'];
     echo $args['before_title'] . $title_1 . $args['after_title'];

   }
		// This is where you run the code and display the output
		echo $args['after_widget'];
		echo '</div>';

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


		<a href="#"> <p>
		<!--<label for="<php echo $this->get_field_id( 'logo' ); ?>"><php _e( 'Image upload:' ); ?></label> -->
		<input class="widefat" id="<?php echo $this->get_field_id( 'logo' ); ?>" name="<?php echo $this->get_field_name( 'logo' ); ?>" type="text"  value="<?php echo esc_attr( $logo ); ?>" />
		</p>
		</a>


		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>


    <a href="#"> <p>
 		<!--<label for="<php echo $this->get_field_id( 'logo' ); ?>"><php _e( 'Image upload:' ); ?></label> -->
 		<input class="widefat" id="<?php echo $this->get_field_id( 'logo_1' ); ?>" name="<?php echo $this->get_field_name( 'logo_1' ); ?>" type="text"  value="<?php echo esc_attr( $logo_1 ); ?>" />
 		</p>
 		</a>


 		<p>
 		<label for="<?php echo $this->get_field_id( 'title_1' ); ?>"><?php _e( 'Title:' ); ?></label>
 		<input class="widefat" id="<?php echo $this->get_field_id( 'title_1' ); ?>" name="<?php echo $this->get_field_name( 'title_1' ); ?>" type="text" value="<?php echo esc_attr( $title_1 ); ?>" />
 		</p>




		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	    $instance['logo'] = ( ! empty( $new_instance['logo'] ) ) ? strip_tags( $new_instance['logo'] ) : '';

      $instance['title_1'] = ( ! empty( $new_instance['title_1'] ) ) ? strip_tags( $new_instance['title_1'] ) : '';
        $instance['logo_1'] = ( ! empty( $new_instance['logo_1'] ) ) ? strip_tags( $new_instance['logo_1'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here



register_widget( 'wpb_widget' );
