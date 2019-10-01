<?php
/* Template Name: page-about*/
?>
<?php get_header(); ?>

<div class="container-fluid clearfix">
  <div class="row">

    <div class="page-header">
         <h1> <?php  the_title();  ?> </h1>
     </div>
 </div>
</div>


<div class="container">
  <?php
   if (have_posts()) :
      while (have_posts()) : the_post(); ?>
           <?php the_content();
      endwhile;
  endif;
  ?>
  <hr class="page-divider">

</div>




<div class="container team-members">
   <div class="col-md-3 col-sm-3 col-xs-12">
        <img src="<?php  echo get_theme_mod( 'employee-1', 'No copyright information has been saved yet.' );?>" alt="">
        <h3> <?php  echo get_theme_mod( 'employee-name', 'No copyright information has been saved yet.' );?> </h3>
   </div>
   <div class="col-md-3 col-sm-3 col-xs-12">
             <img src="<?php  echo get_theme_mod( 'employee-2', 'No copyright information has been saved yet.' );?>" alt="">
             <h3> <?php  echo get_theme_mod( 'employee-2-name', 'No copyright information has been saved yet.' );?> </h3>
   </div>
   <div class="col-md-3 col-sm-3 col-xs-12">
              <img src="<?php  echo get_theme_mod( 'employee-3', 'No copyright information has been saved yet.' );?>" alt="">
              <h3> <?php  echo get_theme_mod( 'employee-3-name', 'No copyright information has been saved yet.' );?> </h3>
   </div>
   <div class="col-md-3 col-sm-3 col-xs-12">
              <img src="<?php  echo get_theme_mod( 'employee-4', 'No copyright information has been saved yet.' );?>" alt="">
              <h3> <?php  echo get_theme_mod( 'employee-4-name', 'No copyright information has been saved yet.' );?> </h3>
   </div>
</div>


<div class="container product-lists">
   <div class="row">
         <div class="col-md-4 col-sm-4 col-xs-12">


           <div class="product-list">
                <a class="btn btn-theme btn-title-more" href="product-category/men/">See All</a>
                <h4 class="block-title"><span>TOP SELLERS </span></h4>

                   <?php   echo do_shortcode('[products limit="3" tag="top-sellers"]'); ?>

            </div>




         </div>
         <div class="col-md-4 col-sm-4 col-xs-12">

           <div class="product-list">
                <a class="btn btn-theme btn-title-more" href="product-category/men/">See All</a>
                <h4 class="block-title"><span>Men Watches</span></h4>

                <?php   echo do_shortcode('[products limit="3" category="men"]'); ?>

            </div>

         </div>



         <div class="col-md-4 col-sm-4 col-xs-12">
           <div class="product-list">
                <a class="btn btn-theme btn-title-more" href="product-category/women/">See All</a>
                <h4 class="block-title"><span>Womens Watches</span></h4>

                     <?php   echo do_shortcode('[products limit="3" category="women"]'); ?>

            </div>
         </div>


      </div>
   </div>




   <?php get_footer(); ?>
