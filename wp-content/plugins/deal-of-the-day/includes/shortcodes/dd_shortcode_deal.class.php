<?php
/**
 * @author 		Junaid
 * @category 	Admin
 * @package 	deal-of-the-day/Admin
 * @version     1.0
 */
class DD_Shortcode_Deal {

	/**
	 * Output the shortcode.
	 *
	 * @access public
	 * @param array $atts
	 * @return void
	 */
	public static function output($atts) {
		global $wp, $dealofday;
		
		
		wp_enqueue_style('deals-listing', $dealofday->plugin_url() . '/assets/css/deals_listing.css');
		$dod_page_theme = get_post_meta(get_the_ID(), 'dod_page_theme');
		$dod_theme = array_shift($dod_page_theme);
		$args = array();
		$args['post_type'] = 'product';
		$args['meta_key'] = 'dod_is_in_dod';
		$args['meta_value'] = 'on';
		$args['orderby'] = 'menu_order';
		$args['order'] = 'ASC';
		add_filter('posts_results', array(&$dealofday, 'order_by_featured'), PHP_INT_MAX, 2);
		$the_query = new WP_Query($args);


		if($the_query->have_posts()):

			while ($the_query->have_posts()):$the_query->the_post();

				if (self::is_expired(get_post_meta(get_the_ID(), 'dod_end_date', true))) {
				delete_post_meta(get_the_ID(), 'dod_is_in_dod');
				delete_post_meta(get_the_ID(), 'dod_start_date');
				delete_post_meta(get_the_ID(), 'dod_end_date');

			}
			endwhile;

		endif;
		

		if($dod_theme == 'theme-1'){
			include 'views/deal_of_day_theme_1.php';
		}

		elseif($dod_theme == 'theme-2'){
			include 'views/deal_of_day_theme_2.php';
		}


		elseif($dod_theme == 'theme-3'){
			include 'views/deal_of_day_theme_3.php';
		}

		elseif($dod_theme == 'theme-4'){
			include 'views/deal_of_day_theme_4.php';
		}
		
	}

	/**
	 * return int
	 */
	public static function is_expired($date) {
		return strtotime($date) <= time();
	}

}
