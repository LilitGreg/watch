<?php
/**
 *
 * @author      Junaid
 * @category    Admin
 * @package     deal-of-the-day/Admin
 * @version     1.0
 */
class DOD_Ajax {

	/**
	 * init() function to be called on initilization.
	 */
	public static function init() {

		$ajax_events = array(
			'dod_update_deal_status',
			'update_deals_order',
			'dod_featured_deal',
			'dod_product_search',
			'dod_add_deal',
			'dod_remove_deal',
			'dod_bulk_add_to_cart',
			'dod_select_theme'
		);
		foreach ($ajax_events as $ajax_event) {
			add_action('wp_ajax_' . $ajax_event, array(__CLASS__, $ajax_event));
			
		}
	}



	/**
	 * Ajax action to update the deal status. Hide/Show from listing on deal page
	 * @return void
	 **/
	public static function dod_update_deal_status() {
		global $wpdb;// this is how you get access to the database
		$deal_id = intval($_POST['deal_id']);
		$status = array_shift(get_post_meta($deal_id, 'dod_active_deal'));
		echo update_post_meta($deal_id, 'dod_active_deal', DOD_Ajax::reverse_status($status), $status);
		die();// this is required to terminate immediately and return a proper response
	}

	/**
	 *   Ajax action to update the deal sorting orders.
	 * @return void
	 **/
	public static function update_deals_order() {
		global $wpdb;// this is how you get access to the database
		$response = 0;
		parse_str($_POST['order'], $data);
		if (is_array($data)) {
			foreach ($data as $key => $values) {
				if ($key == 'item') {
					foreach ($values as $position => $id) {
						$data = array('menu_order' => $position, 'post_parent' => 0);
						$data = apply_filters('post-types-order_save-ajax-order', $data, $key, $id);
						$updated = $wpdb->update($wpdb->posts, $data, array('ID' => $id));
						if ($updated) {
							$response = 1;
						}
					}
				} else {
					foreach ($values as $position => $id) {
						$data = array('menu_order' => $position, 'post_parent' => str_replace('item_', '', $key));
						$data = apply_filters('post-types-order_save-ajax-order', $data, $key, $id);
						$wpdb->update($wpdb->posts, $data, array('ID' => $id));
						if ($updated) {
							$response = 1;
						}
					}
				}
			}
		}

		echo $response;
		die();// this is required to terminate immediately and return a proper response
	}
	/**
	 * Ajax action to mark a deal as featured, Freatured deals will show up in the top of the deals listing
	 *
	 * @return void
	 **/
	public static function dod_featured_deal() {
		global $wpdb;// this is how you get access to the database
		$deal_id = intval($_POST['deal_id']);
		$status = array_shift(get_post_meta($deal_id, 'dod_featured_deal'));
		echo update_post_meta($deal_id, 'dod_featured_deal', DOD_Ajax::reverse_status($status), $status);
		die();// this is required to terminate immediately and return a proper response
	}


	public static function dod_product_search(){

		global $wpdb;// this is how you get access to the database

		 $query = $_POST['query'];
		    
		    $args = array(
		        'post_type' => 'product',
		        'post_status' => 'publish',
		        's' => $query
		    );
		    $search = new WP_Query( $args );
		    
		    $return_html = '';

		    
		    if ( $search->have_posts() ) : 
		   			$return_html .= '<ul>';
					while ( $search->have_posts() ) : $search->the_post();
						$return_html .= '<li>';
						$return_html .=  '<a href="javascript:" class="dod_select_product" product-id="'.get_the_ID().'" > ' . get_the_title();
						$return_html .= '<li>';
						
					endwhile;
					$return_html .= '</ul>';
				
			else :
				$return_html .= "<p>no posts found</p>";
			endif;
		
			
			echo $return_html;
			die();
	}

	public static function dod_add_deal(){
		
		if(is_array($_POST['products'])){
			foreach ($_POST['products'] as $pid) {

				if( empty($_POST['dod_start_date']) || empty($_POST['dod_end_date']) ){
					echo "datenotfound";
					die();
				}

				update_post_meta($pid, 'dod_is_in_dod', 'on');
				update_post_meta($pid, 'dod_start_date', $_POST['dod_start_date']);
				update_post_meta($pid, 'dod_end_date', $_POST['dod_end_date']);

				echo "All done";

			}
		}
		else{
			echo "products";
			die();
		}

		die();
	}


	

	public static function dod_remove_deal(){

				delete_post_meta($_POST['product_id'], 'dod_is_in_dod');
				delete_post_meta($_POST['product_id'], 'dod_start_date');
				delete_post_meta($_POST['product_id'], 'dod_end_date');

				echo $_POST['product_id'];

				die();
	}



	public static function dod_select_theme(){
		
		$old_theme = get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true);

	
		update_post_meta(get_option('dod_page_id'), 'dod_page_theme', $_POST['dataid']);

		echo $old_theme;

		die();
	}



	/**
	 * returns reverse of current status,
	 *
	 * @return string
	 */
	public function reverse_status($status) {
		return $status == 'Yes' ? 'No' : 'Yes';
	}
}
DOD_Ajax::init();