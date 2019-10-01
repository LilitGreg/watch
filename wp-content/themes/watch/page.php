<?php get_header(); ?>

<div class="container-fluid clearfix">
  <div class="row">

    <div class="page-header">
         <h1> <?php  the_title();  ?> </h1>
     </div>
</div>
</div>

 <div class="container clearfix">
    <div class="row row_page">
             <?php
              if (have_posts()) :
                 while (have_posts()) : the_post(); ?>
                      <?php the_content();
                 endwhile;
             endif;
             ?>
     </div>
</div>
<?php get_footer(); ?>
