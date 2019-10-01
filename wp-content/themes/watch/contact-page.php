<?php
/* Template Name: page-contact*/
?>
<?php get_header(); ?>

<div class="container-fluid clearfix">
  <div class="row">

    <div class="page-header">
         <h1> <?php  the_title();  ?> </h1>
     </div>
 </div>
</div>

 <div class="container container-inner-page clearfix">
    <div class="row row_page">
       <div class="col-md-4 col-sm-4 col-xs-12">
         <h2 class="block-title"><span>Contact Us</span></h2>


           <div class="media-list">
                  <div class="media">
                      <i class="pull-left fa fa-home"></i>
                      <div class="media-body">
                          <strong>Address:</strong><br>
                          <?php  echo get_theme_mod( 'address', 'No copyright information has been saved yet.' );?>

                      </div>
                  </div>
                  <div class="media">
                      <i class="pull-left fa fa-phone"></i>
                      <div class="media-body">
                          <strong>Telephone:</strong><br>
                          <?php  echo get_theme_mod( 'telephone', 'No copyright information has been saved yet.' );?>

                      </div>
                  </div>
                  <div class="media">
                      <i class="pull-left fa fa-envelope-o"></i>
                      <div class="media-body">
                          <strong>Fax:</strong><br>
                          <?php  echo get_theme_mod( 'fax', 'No copyright information has been saved yet.' );?>

                      </div>
                  </div>

              </div>
         <?php
          if (have_posts()) :
             while (have_posts()) : the_post(); ?>
                  <?php the_content();
             endwhile;
         endif;
         ?>
       </div>

       <div class="col-md-8 col-sm-8 col-xs-12">
         <h2 class="block-title"><span>Contact Form</span></h2>
         <?php  echo do_shortcode('[contact-form-7 id="214" title="Contact"]');  ?>
       </div>

     </div>
</div>

<div class="container-fluid">
  <div class="row">

  <iframe
      width="600"
      height="450"
      frameborder="0" style="border:0" class="map"
      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAU9942IQIFjNETyBwIskb_NuVF2dMNm_s
        &q=<?php  echo  urlencode(get_theme_mod( 'copyright_map', 'No copyright information has been saved yet.' ));  ?>" allowfullscreen>
    </iframe>

  </div>
</div>


<?php get_footer(); ?>
