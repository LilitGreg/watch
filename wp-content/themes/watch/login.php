<?php
/*
Template Name: Login Page
*/

the_post();
get_header();

if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "http://localhost/watch/";
}
?>

 <div class="container login-cont">
   <div class="row">
     <div class="col-md-6 col-sm-6 col-xs-12">
       <h2 class="block-title"> <?php the_title(); ?></h2>
       <h6> HELLO, WELCOME TO YOUR ACCOUNT </h6>
        <div class="custom_login_div">
            <?php wp_login_form(array('redirect' => $url)); ?>
        </div>
     </div>

     <div class="col-md-6 col-sm-6 col-xs-12">
        <h2 class="block-title">Create New Account </h2>
        <h6> CREATE YOUR ACCOUNT ON BELLASHOP </h6>
        <div class="">
        

          <a href="/watch/register" class="btn-theme btn-theme-dark register-btn"> Create Account</a>
        </div>

     </div>
   </div>

</div>



<?php get_footer() ?>
