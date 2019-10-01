<?php


function style_script_lode(){

 wp_enqueue_script('jquery_library', get_template_directory_uri() . '/js/jquery-2.1.4.min.js');
 wp_enqueue_script('bootstrapjs', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

  wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');

  // wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/theme.js');
  wp_enqueue_style('awesome-icons', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
  wp_enqueue_style('bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
  wp_enqueue_style('digex-css', get_template_directory_uri(). '/css/style.css');



  // wp_enqueue_style('owlfs-css', get_template_directory_uri(). '/css/owl.carousel.css');
  wp_enqueue_style('owlfs-min-css', get_template_directory_uri(). '/css/owl.carousel.min.css');
  wp_enqueue_style('owlfs-default-css', get_template_directory_uri(). '/css/owl.theme.default.min.css');
  wp_enqueue_script('owlfs-js', get_template_directory_uri() . '/js/owl.carousel.min.js');



  // wp_enqueue_style('owl-css', get_template_directory_uri(). '/plugins/owl-carousel2/assets/owl.carousel.min.css');
  // wp_enqueue_style('owl-css-default', get_template_directory_uri(). '/plugins/owl-carousel2/assets/owl.theme.default.min.css');
  // wp_enqueue_script('owl-js', get_template_directory_uri() . '/plugins/owl-carousel2/owl.carousel.min.js');


 }
add_action('wp_enqueue_scripts', 'style_script_lode');


function watch_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-header-container clearfix',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="clearfix">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function extra_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'extra-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-header-container clearfix',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="clearfix">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function footer_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-header-container clearfix',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="clearfix">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}




function register_watch_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'watch'), // Main Navigation
         'extra-menu' => __('Extra Menu', 'watch'), // Top Header Navigation
         'footer-menu' => __('Footer Menu', 'watch'), // Footer Navigation
    ));
}
add_action('init', 'register_watch_menu');



/*----------customization--------------*/
function watch_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'header',
        array(
            'title' => 'Header',
            'description' => 'This is a header.',
            'priority' => 15,
        )
    );


  $wp_customize->add_setting( 'img-upload' );

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'img-upload',
	        array(
	            'label' => 'Image Upload',
	            'section' => 'header',
	            'settings' => 'img-upload'
	        )
	    )
	);


  $wp_customize->add_setting(
       'email',
       array(
           'default' => 'support@yourdomain.com',
       )
   );
   $wp_customize->add_control(
       'email',
       array(
           'label' => 'Email',
           'section' => 'header',
           'type' => 'text',
       )
   );


   $wp_customize->add_section(
       'home-slider',
       array(
           'title' => 'Home slider images',
           'description' => 'This is a home slider',
           'priority' => 15,
       )
   );

   $wp_customize->add_setting('slide1');

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slide1',
            array(
                'label' => 'Slide1',
                'section' => 'home-slider',
                'settings' => 'slide1'
            )
        )
    );

    $wp_customize->add_setting(
         'caption-header-slide1',
         array(
             'default' => 'The Biggest',
         )
     );
     $wp_customize->add_control(
         'caption-header-slide1',
         array(
             'label' => 'Slide1 caption title',
             'section' => 'home-slider',
             'type' => 'text',
         )
     );

     $wp_customize->add_setting(
          'caption2-header-slide1',
          array(
              'default' => 'Sale',
          )
      );
      $wp_customize->add_control(
          'caption2-header-slide1',
          array(
              'label' => 'Slide1 caption subtitle',
              'section' => 'home-slider',
              'type' => 'text',
          )
      );

      $wp_customize->add_setting(
           'button-slide1',
           array(
               'default' => '#',
           )
       );
       $wp_customize->add_control(
           'button-slide1',
           array(
               'label' => 'Slide1 button',
               'section' => 'home-slider',
               'type' => 'text',
           )
       );




    $wp_customize->add_setting('slide2');

     $wp_customize->add_control(
         new WP_Customize_Image_Control(
             $wp_customize,
             'slide2',
             array(
                 'label' => 'Slide2',
                 'section' => 'home-slider',
                 'settings' => 'slide2'
             )
         )
     );


     $wp_customize->add_setting(
          'caption-header-slide2',
          array(
              'default' => 'New Arrivals On Sale',
          )
      );
      $wp_customize->add_control(
          'caption-header-slide2',
          array(
              'label' => 'Slide2 caption title',
              'section' => 'home-slider',
              'type' => 'text',
          )
      );

      $wp_customize->add_setting(
           'caption2-header-slide2',
           array(
               'default' => 'Summer Collection',
           )
       );
       $wp_customize->add_control(
           'caption2-header-slide2',
           array(
               'label' => 'Slide2 caption subtitle',
               'section' => 'home-slider',
               'type' => 'text',
           )
       );

       $wp_customize->add_setting(
            'button-slide2',
            array(
                'default' => '#',
            )
        );
        $wp_customize->add_control(
            'button-slide2',
            array(
                'label' => 'Slide2 button',
                'section' => 'home-slider',
                'type' => 'text',
            )
        );

     $wp_customize->add_setting('slide3');

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize,
              'slide3',
              array(
                  'label' => 'Slide3',
                  'section' => 'home-slider',
                  'settings' => 'slide3'
              )
          )
      );


      $wp_customize->add_setting(
           'caption-header-slide3',
           array(
               'default' => 'New Arrivals On Sale',
           )
       );
       $wp_customize->add_control(
           'caption-header-slide3',
           array(
               'label' => 'Slide3 caption title',
               'section' => 'home-slider',
               'type' => 'text',
           )
       );

       $wp_customize->add_setting(
            'caption2-header-slide3',
            array(
                'default' => 'Summer Collection',
            )
        );
        $wp_customize->add_control(
            'caption2-header-slide3',
            array(
                'label' => 'Slide3 caption subtitle',
                'section' => 'home-slider',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting(
             'button-slide3',
             array(
                 'default' => '#',
             )
         );
         $wp_customize->add_control(
             'button-slide3',
             array(
                 'label' => 'Slide3 button',
                 'section' => 'home-slider',
                 'type' => 'text',
             )
         );




         $wp_customize->add_setting('home-slider-left');

          $wp_customize->add_control(
              new WP_Customize_Image_Control(
                  $wp_customize,
                  'home-slider-left',
                  array(
                      'label' => 'Home Slider Left',
                      'section' => 'home-slider',
                      'settings' => 'home-slider-left'
                  )
              )
          );

          $wp_customize->add_setting('home-slider-right');

           $wp_customize->add_control(
               new WP_Customize_Image_Control(
                   $wp_customize,
                   'home-slider-right',
                   array(
                       'label' => 'Home Slider Right',
                       'section' => 'home-slider',
                       'settings' => 'home-slider-right'
                   )
               )
           );

           $wp_customize->add_setting(
                'caption-slider-title',
                array(
                    'default' => 'Apple Watches',
                )
            );
            $wp_customize->add_control(
                'caption-slider-title',
                array(
                    'label' => 'Left slider title',
                    'section' => 'home-slider',
                    'type' => 'text',
                )
            );

            $wp_customize->add_setting(
                 'caption-slider-subtitle',
                 array(
                     'default' => 'Our most personal device yet',
                 )
             );
             $wp_customize->add_control(
                 'caption-slider-subtitle',
                 array(
                     'label' => 'Left slider subtitle',
                     'section' => 'home-slider',
                     'type' => 'text',
                 )
             );


             $wp_customize->add_setting(
                  'caption-slider-button',
                  array(
                      'default' => '#',
                  )
              );
              $wp_customize->add_control(
                  'caption-slider-button',
                  array(
                      'label' => 'Left slider Button',
                      'section' => 'home-slider',
                      'type' => 'text',
                  )
              );




              $wp_customize->add_setting(
                   'caption-slider-right-title',
                   array(
                       'default' => 'Find your Rolex',
                   )
               );
               $wp_customize->add_control(
                   'caption-slider-right-title',
                   array(
                       'label' => 'Right slider title',
                       'section' => 'home-slider',
                       'type' => 'text',
                   )
               );

               $wp_customize->add_setting(
                    'caption-slider-right-subtitle',
                    array(
                        'default' => 'May we help you choose your Rolex?',
                    )
                );
                $wp_customize->add_control(
                    'caption-slider-right-subtitle',
                    array(
                        'label' => 'Right slider subtitle',
                        'section' => 'home-slider',
                        'type' => 'text',
                    )
                );


                $wp_customize->add_setting(
                     'caption-slider-right-button',
                     array(
                         'default' => '#',
                     )
                 );
                 $wp_customize->add_control(
                     'caption-slider-right-button',
                     array(
                         'label' => 'Right slider Button',
                         'section' => 'home-slider',
                         'type' => 'text',
                     )
                 );




         $wp_customize->add_section(
             'footer',
             array(
                 'title' => 'Footer',
                 'description' => 'This is a footer.',
                 'priority' => 15,
             )
         );


         $wp_customize->add_setting(
              'fb-link',
              array(
                  'default' => '#',
              )
          );
          $wp_customize->add_control(
              'fb-link',
              array(
                  'label' => 'Facebook',
                  'section' => 'footer',
                  'type' => 'text',
              )
          );

          $wp_customize->add_setting(
               'tw-link',
               array(
                   'default' => '#',
               )
           );
           $wp_customize->add_control(
               'tw-link',
               array(
                   'label' => 'Twitter',
                   'section' => 'footer',
                   'type' => 'text',
               )
           );

           $wp_customize->add_setting(
                'inst-link',
                array(
                    'default' => '#',
                )
            );
            $wp_customize->add_control(
                'inst-link',
                array(
                    'label' => 'Instagram',
                    'section' => 'footer',
                    'type' => 'text',
                )
            );


            $wp_customize->add_setting(
                 'pint-link',
                 array(
                     'default' => '#',
                 )
             );
             $wp_customize->add_control(
                 'pint-link',
                 array(
                     'label' => 'Pinterest',
                     'section' => 'footer',
                     'type' => 'text',
                 )
             );

             $wp_customize->add_setting('payment-method');

              $wp_customize->add_control(
                  new WP_Customize_Image_Control(
                      $wp_customize,
                      'payment-method',
                      array(
                          'label' => 'Payment',
                          'section' => 'footer',
                          'settings' => 'payment-method'
                      )
                  )
              );


              $wp_customize->add_setting('payment-method-2');
              $wp_customize->add_control(
                  new WP_Customize_Image_Control(
                      $wp_customize,
                      'payment-method-2',
                      array(
                          'label' => 'Payment-2',
                          'section' => 'footer',
                          'settings' => 'payment-method-2'
                      )
                  )
              );


              $wp_customize->add_setting('payment-method-3');
              $wp_customize->add_control(
                  new WP_Customize_Image_Control(
                      $wp_customize,
                      'payment-method-3',
                      array(
                          'label' => 'Payment-3',
                          'section' => 'footer',
                          'settings' => 'payment-method-3'
                      )
                  )
              );

                  $wp_customize->add_setting('payment-method-4');
              $wp_customize->add_control(
                  new WP_Customize_Image_Control(
                      $wp_customize,
                      'payment-method-4',
                      array(
                          'label' => 'Payment-4',
                          'section' => 'footer',
                          'settings' => 'payment-method-4'
                      )
                  )
              );

                  $wp_customize->add_setting('payment-method-5');
              $wp_customize->add_control(
                  new WP_Customize_Image_Control(
                      $wp_customize,
                      'payment-method-5',
                      array(
                          'label' => 'Payment-5',
                          'section' => 'footer',
                          'settings' => 'payment-method-5'
                      )
                  )
              );

             $wp_customize->add_setting('payment-method-6');
              $wp_customize->add_control(
                  new WP_Customize_Image_Control(
                      $wp_customize,
                      'payment-method-6',
                      array(
                          'label' => 'Payment-6',
                          'section' => 'footer',
                          'settings' => 'payment-method-6'
                      )
                  )
              );



              $wp_customize->add_section(
                  'contact',
                  array(
                      'title' => 'Contact',
                      'description' => 'This is a Contact.',
                      'priority' => 15,
                  )
              );

              $wp_customize->add_setting(
                   'address',
                   array(
                       'default' => '987 Main st. New York, NY, 00001, U.S.A',
                   )
               );
               $wp_customize->add_control(
                   'address',
                   array(
                       'label' => 'Address',
                       'section' => 'contact',
                       'type' => 'text',
                   )
               );

               $wp_customize->add_setting(
                    'telephone',
                    array(
                        'default' => '(012) 345-7689',
                    )
                );
                $wp_customize->add_control(
                    'telephone',
                    array(
                        'label' => 'Telephone',
                        'section' => 'contact',
                        'type' => 'text',
                    )
                );

                $wp_customize->add_setting(
                     'fax',
                     array(
                         'default' => '0123456789',
                     )
                 );
                 $wp_customize->add_control(
                     'fax',
                     array(
                         'label' => 'Fax',
                         'section' => 'contact',
                         'type' => 'text',
                     )
                 );



                 $wp_customize->add_setting(
                    'copyright_map',
                    array(
                        'default' => 'Istambul',
                    )
                 );


                 $wp_customize->add_control(
                    'copyright_map',
                    array(
                        'label' => 'Address in map',
                        'section' => 'contact',
                        'type' => 'text',
                    )
                 );


                 $wp_customize->add_section(
                     'about',
                     array(
                         'title' => 'About',
                         'description' => 'This is a About.',
                         'priority' => 15,
                     )
                 );


                 $wp_customize->add_setting('employee-1');
                  $wp_customize->add_control(
                      new WP_Customize_Image_Control(
                          $wp_customize,
                          'employee-1',
                          array(
                              'label' => 'Employee Image',
                              'section' => 'about',
                              'settings' => 'employee-1'
                          )
                      )
                  );

                  $wp_customize->add_setting(
                       'employee-name',
                       array(
                           'default' => 'STANDARD NAME',
                       )
                   );
                   $wp_customize->add_control(
                       'employee-name',
                       array(
                           'label' => 'Employee Name',
                           'section' => 'about',
                           'type' => 'employee-name',
                       )
                   );

                  $wp_customize->add_setting('employee-2');
                   $wp_customize->add_control(
                       new WP_Customize_Image_Control(
                           $wp_customize,
                           'employee-2',
                           array(
                               'label' => 'Employee Image',
                               'section' => 'about',
                               'settings' => 'employee-2'
                           )
                       )
                   );

                   $wp_customize->add_setting(
                        'employee-2-name',
                        array(
                            'default' => 'STANDARD NAME',
                        )
                    );
                    $wp_customize->add_control(
                        'employee-2-name',
                        array(
                            'label' => 'Second Employee Name',
                            'section' => 'about',
                            'type' => 'employee-2-name',
                        )
                    );


                   $wp_customize->add_setting('employee-3');
                    $wp_customize->add_control(
                        new WP_Customize_Image_Control(
                            $wp_customize,
                            'employee-3',
                            array(
                                'label' => 'Employee Image',
                                'section' => 'about',
                                'settings' => 'employee-3'
                            )
                        )
                    );

                    $wp_customize->add_setting(
                         'employee-3-name',
                         array(
                             'default' => 'STANDARD NAME',
                         )
                     );
                     $wp_customize->add_control(
                         'employee-3-name',
                         array(
                             'label' => 'Third Employee Name',
                             'section' => 'about',
                             'type' => 'employee-3-name',
                         )
                     );

                    $wp_customize->add_setting('employee-4');
                     $wp_customize->add_control(
                         new WP_Customize_Image_Control(
                             $wp_customize,
                             'employee-4',
                             array(
                                 'label' => 'Employee Image',
                                 'section' => 'about',
                                 'settings' => 'employee-4'
                             )
                         )
                     );

                     $wp_customize->add_setting(
                          'employee-4-name',
                          array(
                              'default' => 'STANDARD NAME',
                          )
                      );
                      $wp_customize->add_control(
                          'employee-4-name',
                          array(
                              'label' => 'Forth Employee Name',
                              'section' => 'about',
                              'type' => 'employee-4-name',
                          )
                      );



}

add_action( 'customize_register', 'watch_customizer' );




 // Change number or products per row to 5
 add_filter('loop_shop_columns', 'loop_columns');
 if (!function_exists('loop_columns')) {
     function loop_columns() {
         return 3; // 5 products per row
     }
 }


// ----- validate password match on the registration page
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);

// ----- add a confirm password fields match on the registration page
function wc_register_form_password_repeat() {
	?>
	<p class="form-row form-row-wide">
		<label for="reg_password2"><?php _e( 'Password Repeat', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
	</p>
	<?php
}
add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );

// ----- Validate confirm password field match to the checkout page
function lit_woocommerce_confirm_password_validation( $posted ) {
    $checkout = WC()->checkout;
    if ( ! is_user_logged_in() && ( $checkout->must_create_account || ! empty( $posted['createaccount'] ) ) ) {
        if ( strcmp( $posted['account_password'], $posted['account_confirm_password'] ) !== 0 ) {
            wc_add_notice( __( 'Passwords do not match.', 'woocommerce' ), 'error' );
        }
    }
}

add_action( 'woocommerce_after_checkout_validation', 'lit_woocommerce_confirm_password_validation', 10, 2 );

// ----- Add a confirm password field to the checkout page
function lit_woocommerce_confirm_password_checkout( $checkout ) {
    if ( get_option( 'woocommerce_registration_generate_password' ) == 'no' ) {

        $fields = $checkout->get_checkout_fields();

        $fields['account']['account_confirm_password'] = array(
            'type'              => 'password',
            'label'             => __( 'Confirm password', 'woocommerce' ),
            'required'          => true,
            'placeholder'       => _x( 'Confirm Password', 'placeholder', 'woocommerce' )
        );

        $checkout->__set( 'checkout_fields', $fields );
    }
}
add_action( 'woocommerce_checkout_init', 'lit_woocommerce_confirm_password_checkout', 10, 1 );



function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );





/*-------------------widgets---------------------*/
function theme_slug_widgets_init() {


    register_sidebar( array(
        'name' => __( 'Woocommerce-custom-sidebar', 'theme-slug' ),
        'id' => 'woocommerce-custom-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</li>',
    		'before_title'  => '<p class="widgettitle">',
    		'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name' => __( 'Blog-sidebar', 'theme-slug' ),
        'id' => 'blog-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<p class="widgettitle">',
        'after_title'   => '</p>',
    ) );


    // register_sidebar( array(
    //     'name' => __( 'Portfolio-bar', 'theme-slug' ),
    //     'id' => 'portfolio-bar',
    //     'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
    //     'before_widget' => '<li id="%1$s" class="widget %2$s">',
    //     'after_widget'  => '</li>',
    //     'before_title'  => '<p class="widgettitle">',
    //     'after_title'   => '</p>',
    // ) );


    register_sidebar( array(
        'name' => __( 'Home-sidebar', 'theme-slug' ),
        'id' => 'home-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</li>',
    		'before_title'  => '<p class="widgettitle">',
    		'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer-Left', 'theme-slug' ),
        'id' => 'footer-left',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</li>',
    		'before_title'  => '<p class="widgettitle">',
    		'after_title'   => '</p>',
    ) );


    register_sidebar( array(
        'name' => __( 'Footer-Left-Inner', 'theme-slug' ),
        'id' => 'footer-left-inner',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget'  => '</li>',
       'before_title'  => '<p class="widgettitle">',
       'after_title'   => '</p>',
    ) );


    register_sidebar( array(
        'name' => __( 'Footer-Right-Inner', 'theme-slug' ),
        'id' => 'footer-right-inner',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget'  => '</li>',
       'before_title'  => '<p class="widgettitle">',
       'after_title'   => '</p>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer-Right', 'theme-slug' ),
        'id' => 'footer-right',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget'  => '</li>',
       'before_title'  => '<p class="widgettitle">',
       'after_title'   => '</p>',
    ) );


    register_sidebar( array(
        'name' => __( 'Footer-Bottom', 'theme-slug' ),
        'id' => 'footer-bottom',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget'  => '</li>',
       'before_title'  => '<p class="widgettitle">',
       'after_title'   => '</p>',
    ) );



    register_sidebar( array(
        'name' => __( 'Product-Clients', 'theme-slug' ),
        'id' => 'product-clients',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
       'after_widget'  => '</li>',
       'before_title'  => '<p class="widgettitle">',
       'after_title'   => '</p>',
    ) );




}

add_action( 'widgets_init', 'theme_slug_widgets_init' );



// do_action( 'woocommerce_sidebar', $woocommerce_get_sidebar, $int );
//
//
 add_post_type_support( 'post_type', 'woosidebars' );


 add_filter( 'comments_open', 'my_comments_open', 10, 2 );

function my_comments_open( $open, $post_id ) {

	$post = get_post( $post_id );

        if (get_post_meta($post->ID, 'Allow Comments', true)) {$open = true;}

	return $open;
}


// function base_pagination() {
//     global $wp_query;
//
//     $big = 999999999; // This needs to be an unlikely integer
//
//     // For more options and info view the docs for paginate_links()
//     // http://codex.wordpress.org/Function_Reference/paginate_links
//     $paginate_links = paginate_links( array(
//         'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
//         'current' => max( 1, get_query_var('paged') ),
//         'total' => $wp_query->max_num_pages,
//         'mid_size' => 5
//     ) );
//
//     // Display the pagination if more than one page is found
//     if ( $paginate_links ) {
//         echo '<div class="pagination">';
//         echo $paginate_links;
//         echo '</div><!--// end .pagination -->';
//     }
// }





/*----------------commmentt---*/
function watch_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says"> ասում է:</span>' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>

  <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">

        <?php
        /* translators: 1: date, 2: time */
        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
        ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }

add_action('comm','watch_comment');
// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments




   add_theme_support('automatic-feed-links');

   function my_remove_recent_comments_style()
   {
       global $wp_widget_factory;
       remove_action('wp_head', array(
           $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
           'recent_comments_style'
       ));
   }

   add_action('stylerem','my_remove_recent_comments_style');




   /*-----------register custom field -----------*/



   function createCustomField()
   {
       $post_id = get_the_ID();

       if (get_post_type($post_id) != 'post') {
           return;
       }

       $value = get_post_meta($post_id, 'right-siden', true);
       // $valueleft = get_post_meta($post_id, 'left-siden', true);
       wp_nonce_field('my_custom_nonce_'.$post_id, 'my_custom_nonce');
       ?>
       <div class="misc-pub-section misc-pub-section-last">
           <label><input type="checkbox" value="1" <?php checked($value, true, true); ?> name="right-siden" /><?php _e('Right sidebar', 'pmg'); ?></label>

           <!-- <label><input type="checkbox" value="1" <php checked($valueleft, true, true); ?> name="left-siden" /><php _e('Left sidebar', 'pmg'); ?></label> -->
       </div>
       <?php
   }


   function saveCustomField($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (
        !isset($_POST['my_custom_nonce']) ||
        !wp_verify_nonce($_POST['my_custom_nonce'], 'my_custom_nonce_'.$post_id)
    ) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['right-siden'])) {
        update_post_meta($post_id, 'right-siden', $_POST['right-siden']);

    } else {
        delete_post_meta($post_id, 'right-siden');
    }

}

add_action('post_submitbox_misc_actions', 'createCustomField');
add_action('save_post', 'saveCustomField');



/*------custom field for portfoilio--------*/





// function add_your_fields_meta_box() {
// 	add_meta_box(
// 		'your_fields_meta_box', // $id
// 		'Your Fields', // $title
// 		'show_your_fields_meta_box', // $callback
// 		'portfolios', // $screen
// 		'normal', // $context
// 		'high' // $priority
// 	);
// }
// add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
//
//
//
// function show_your_fields_meta_box() {
//   	global $post;
// 		$meta = get_post_meta( $post->ID, 'your_fields', true ); >
//
// 	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); >">
//
//     <!-- All fields will go here --
//
//     	<input type="text"  name="image" src="<?php echo wp_create_nonce( basename(__FILE__) ); >" style="max-width: 250px;">
//
// 	<?php }
//
//
//
//
//   function save_your_fields_meta( $post_id ) {
// 	// verify nonce
// 	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
// 		return $post_id;
// 	}
// 	// check autosave
// 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
// 		return $post_id;
// 	}
// 	// check permissions
// 	if ( 'page' === $_POST['portfolios'] ) {
// 		if ( !current_user_can( 'edit_page', $post_id ) ) {
// 			return $post_id;
// 		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
// 			return $post_id;
// 		}
// 	}
//
// 	$old = get_post_meta( $post_id, 'your_fields', true );
// 	$new = $_POST['your_fields'];
//
// 	if ( $new && $new !== $old ) {
// 		update_post_meta( $post_id, 'your_fields', $new );
// 	} elseif ( '' === $new && $old ) {
// 		delete_post_meta( $post_id, 'your_fields', $old );
// 	}
// }
// add_action( 'save_post', 'save_your_fields_meta' );







function  watch_register_post_type(){

  $singular='Portfolio';
  $plural='Portfolios';

  $labels=array(
  	'name'         =>$plural,
  	'singular_name'=>$singular,
  	'add_name'     =>'Add New',
  	'add_new_item' =>'Add New ' . $singular,
  	'edit'         =>'Edit',
  	'edit_item'    =>'Edit'.$singular,
  	'view'         =>'View'.$singular,
  	'view_item'    =>'View'.$singular,
  	'search_term'  =>'Search'.$plural,
  	'parent'       =>'Parent'.$singular,
  	'not_found'    =>'No'.$plural.'found',
  	'not_found_in_trash'=>'No'.$plural.'in Trash'
  	);


  $args=array(
      'labels'=>$labels,
     'public'              => true,
	 'publicly_queryable'  => true,
	 'exclude_from_search' => true,
	 'show_in_nav_menu'    => true,
	 'show_ui'             => true,
	 'show_in_menu'        => true,
	 'show_in_admin_bar'   => true,
	 'menu_position'       => 6,
	 'menu_icon'           => 'dashicons-info',
     'can_export'          => true,
     'delete_with_user'    => false,
     'query_var'           => true,
     'capability_type'     => 'page',
     'map_meta_cap'        => true,
	 'has_archive'         => false,
     'hierarchical'        => true,
     'taxonomies'  => array( 'category' ),
     // 'taxonomies'          => array('New York Post', 'category' ),

	 'rewrite'             => array(
	  'slug' => 'portfolios',
	   'with_front'=> true,
	   'pages' => true,
	   'feeds' => false,
	   ),
	    'supports'          => array(
		'title',
		 'editor',
         'thumbnail',
         //'excerpt'
		// 'author',
		  'custom-fields',

		 )
  	);
  register_post_type('portfolios',$args);
}
add_action('init','watch_register_post_type');



add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );
add_post_type_support( 'portfolios', 'excerpt' );



/**
 * Display category image on category archive
 */
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    //echo '<img src="' . $image . '" alt="' . $cat->name . '" />';

       echo '
        <div class="slider slider-cat owl-carousel owl-theme">
                <div>  <img src="' . $image . '" alt="' . $cat->name . '" /> </div>
               <div>  <img src="' . $image . '" alt="' . $cat->name . '" /> </div>
               <div>  <img src="' . $image . '" alt="' . $cat->name . '" /> </div>

          </div>';

		}
	}
}



//require_once( get_template_directory() . '/widgets/image-title.php' );
require_once( get_template_directory() . '/widgets/products-tag.php' );



add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
	return '<a class="forget-password" href="/watch/my-account/lost-password/">Forget Password?</a>';
}


/*------widget part ----*/

// Register and load the widget
// function wpb_load_widget() {
//     register_widget( 'wpb_widget' );
//
// }
// add_action( 'widgets_init', 'wpb_load_widget' );
