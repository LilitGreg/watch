
<footer>
    <div class="clearfix  wrap_foot">

     <div class="container">

      <div class="row">

          <div class="col-md-3 col-sm-3 col-xs-12">
                  <?php
                   if ( is_active_sidebar( 'footer-left' ) ) : ?>
                      <ul class="sidebar">
                          <?php dynamic_sidebar( 'footer-left' ); ?>
                      </ul>
                  <?php endif; ?>

                  <ul class="social-icons">
                      <li><a href="<?php  echo get_theme_mod( 'fb-link', 'No copyright information has been saved yet.' );?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="<?php  echo get_theme_mod( 'tw-link', 'No copyright information has been saved yet.' );?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="<?php  echo get_theme_mod( 'inst-link', 'No copyright information has been saved yet.' );?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="<?php  echo get_theme_mod( 'pint-link', 'No copyright information has been saved yet.' );?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                  </ul>
          </div>


          <div class="col-md-3  col-sm-3 col-xs-12">
              <div class="row">
                <?php
                 if ( is_active_sidebar( 'footer-left-inner' ) ) : ?>
                    <ul class="sidebar">
                        <?php dynamic_sidebar( 'footer-left-inner' ); ?>
                    </ul>
                <?php endif; ?>
             </div>
          </div>


          <div class="col-md-3  col-sm-3 col-xs-12 menu-footer">
              <div class="row">
                <?php
                 if ( is_active_sidebar( 'footer-right-inner' ) ) : ?>
                    <ul class="sidebar">
                        <?php dynamic_sidebar( 'footer-right-inner' ); ?>
                    </ul>
                <?php endif; ?>

                 <?php   footer_nav(array('footer-menu' => 'menu', 'container' => '', 'menu_class'  => ''));  ?>

             </div>
          </div>



          <div class="col-md-3  col-sm-3 col-xs-12">
              <div class="row">
                <?php
                 if ( is_active_sidebar( 'footer-right' ) ) : ?>
                    <ul class="sidebar">
                        <?php dynamic_sidebar( 'footer-right' ); ?>
                    </ul>
                <?php endif; ?>

             </div>
          </div>

    </div>

    </div>


    <div class="footer-bottom">
       <div class="container">
         <div class="row">

            <div class="col-md-8 col-sm-7 col-xs-12">
              <?php
               if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
                  <ul class="sidebar">
                      <?php dynamic_sidebar( 'footer-bottom' ); ?>
                  </ul>
              <?php endif; ?>

            </div>

            <div class="col-md-4  col-sm-5 col-xs-12">
                <ul class="payment-methods">
                    <li>  <img src="<?php  echo get_theme_mod( 'payment-method', 'No copyright information has been saved yet.' );?>" alt=""> </li>
                    <li>  <img src="<?php  echo get_theme_mod( 'payment-method-2', 'No copyright information has been saved yet.' );?>" alt=""> </li>
                    <li>  <img src="<?php  echo get_theme_mod( 'payment-method-3', 'No copyright information has been saved yet.' );?>" alt=""> </li>
                    <li>  <img src="<?php  echo get_theme_mod( 'payment-method-4', 'No copyright information has been saved yet.' );?>" alt=""> </li>
                    <li>  <img src="<?php  echo get_theme_mod( 'payment-method-5', 'No copyright information has been saved yet.' );?>" alt=""> </li>
                    <li>  <img src="<?php  echo get_theme_mod( 'payment-method-6', 'No copyright information has been saved yet.' );?>" alt=""> </li>
                </ul>
            </div>
         </div>
       </div>
    </div>


    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
