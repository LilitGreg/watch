<?php
/**
 *
 * @author 		ThemeLocation
 * @package 	deal-of-the-day/Admin
 * @version     1.0
 */

if (!defined('ABSPATH')) {
	exit;// Exit if accessed directly
}

if (!class_exists('DD_Admin_Menus')):

/**
 * Render admin views
 */
	class DD_Admin_Views {

		/**
		 * Hook in tabs.
		 */
		public function __construct() {
			// Add menus
		}
		/**
		 * get deals to show on deals listing and reorder page
		 * @return object
		 */
		public static function getDeals() {
			global $dealofday;
			$args = array();
			$args['post_type'] = 'product';
			$args['meta_key'] = 'dod_is_in_dod';
			$args['meta_value'] = 'on';
			$args['orderby'] = "menu_order";
			$args['order'] = 'ASC';
			add_filter('posts_results', array(&$dealofday, 'order_by_featured'), PHP_INT_MAX, 2);
			return new WP_Query($args);
		}
		/**
		 * save action to update the fields on settings page
		 * @return int
		 */
		public static function save() {
			$page_title = $_POST['page_title'];
			$meta['dod_page_theme'] = $_POST['page_theme'];
			$meta['dod_button_text'] = $_POST['button_text'];
			$meta['dod_button_text'] = $_POST['button_text'];
			$meta['dod_button_background'] = $_POST['button_background'];
			$meta['dod_button_txt_color'] = $_POST['button_txt_color'];
			$meta['dod_button_width'] = $_POST['button_width'];
			$meta['dod_button_height'] = $_POST['button_height'];
			$meta['dod_custom_css'] = $_POST['custom_css'];
			$meta['_wp_page_template'] = $_POST['page_template'];
			return dd_update_page(get_option('dod_page_id'), $page_title, '', $meta);
		}
		/**
		 * Make the tab active on current page
		 * @return string
		 */
		public static function get_active($tab) {
			if (isset($_GET['tab'])) {
				echo $_GET['tab'] == $tab ? 'nav-tab-active' : '';
			} elseif ($tab == 'create-deal') {
			echo 'nav-tab-active';
		}
	}
	/**
	 * Render general setting page
	 * @return void
	 */
	public static function general_settings() {
		global $dealofday;
		$msg = '';
		if (!empty($_POST) && isset($_POST['save-settings'])) {
			$msg = self::save();
		}

		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'dod_custom_js', $dealofday->plugin_url() . '/assets/js/admin/dod.custom.js', array( 'jquery', 'wp-color-picker' ), '', true  );


		$page_id = get_option('dod_page_id');
		$args['page_id'] = $page_id;
		$query = new WP_Query($args);
		$page = $query->posts[0];

		$dod_page_theme = get_post_meta($page_id, 'dod_page_theme');
		$selected_page_theme = array_shift($dod_page_theme);

		$dod_button_text = get_post_meta($page_id, 'dod_button_text');
		$button_text = array_shift($dod_button_text);
		$dod_button_background = get_post_meta($page_id, 'dod_button_background');
		$button_background = array_shift($dod_button_background);
		$dod_button_txt_color = get_post_meta($page_id, 'dod_button_txt_color');
		$button_txt_color = array_shift($dod_button_txt_color);
		$dod_button_width = get_post_meta($page_id, 'dod_button_width');
		$button_width = array_shift($dod_button_width);
		$dod_button_height = get_post_meta($page_id, 'dod_button_height');
		$button_height = array_shift($dod_button_height);
		$dod_custom_css = get_post_meta($page_id, 'dod_custom_css');
		$custom_css = array_shift($dod_custom_css);
		$wp_page_template = get_post_meta($page_id, '_wp_page_template');
		$selected_template = array_shift($wp_page_template);
		$templates = get_page_templates();
		$themes = self::get_themes();
		include 'views/_geneal_settings.php';
	}
	/**
	 * Renders the deals list in Admin panel,
	 * @return void
	 */
	public static function list_deals() {
		global $dealofday, $wp_scripts;
		$msg = '';
		$query = self::getDeals();
		
        wp_enqueue_script('jquery-ui-sortable');// including sortable js library
		wp_enqueue_style( 'dod_custom_admin_css', $dealofday->plugin_url() . '/assets/css/custom.admin.css', array(), '', false  );
		$ui = $wp_scripts->query('jquery-ui-core');
		$protocol = is_ssl() ? 'https' : 'http';
	    $url = "$protocol://ajax.googleapis.com/ajax/libs/jqueryui/{$ui->ver}/themes/smoothness/jquery-ui.min.css";
	    wp_enqueue_style('jquery-ui-smoothness', $url, false, null);
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('validate-css', $dealofday->plugin_url() . '/assets/css/cmxform.css', array(), '', false );
		wp_enqueue_script('jquery-validate-min', $dealofday->plugin_url() . '/assets/js/admin/jquery.validate.min.js', array(), '', true);
			wp_enqueue_script('post-validate', $dealofday->plugin_url() . '/assets/js/admin/post_validate.js', array(), '', true);


		include 'views/_list_deals.php';
	}



	public static function get_themes(){
		$themes = array('Theme 1' => 'theme-1','Theme 2' => 'theme-2','Theme 3' => 'theme-3','Theme 4' => 'theme-4');
		return $themes;
	}

	/**
	 * Renders the How to use page,
	 * @return void
	 */
	public static function how_to_use() {
		$msg = '';
		include 'views/_how_to_use.php';
	}
}

endif;
