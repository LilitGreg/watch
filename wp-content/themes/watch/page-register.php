<?php
/* Template Name: Register-page*/
?>

<?php get_header(); ?>
<div class="container login-cont">
  <div class="row">
      <form method="post" class="woocommerce-form woocommerce-form-register register">

    					<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
    			<label for="reg_sr_firstname">First Name</label>
    			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="sr_firstname" id="reg_sr_firstname" value="">
    		</p>

    		<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
    			<label for="reg_sr_lastname">Last Name</label>
    			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="sr_lastname" id="reg_sr_lastname" value="">
    		</p>


    			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    				<label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
    				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="">			</p>


    				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    					<label for="reg_password">Password&nbsp;<span class="required">*</span></label>
    					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password">
    				</p>


    				<p class="form-row form-row-wide">
    		<label for="reg_password2">Password Repeat <span class="required">*</span></label>
    		<input type="password" class="input-text" name="password2" id="reg_password2" value="">
    	</p>
    	<div class="woocommerce-privacy-policy-text"><p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="http://localhost/watch/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
    </div>
    			<p class="woocommerce-FormRow form-row">
    				<input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="4adacc1c4e"><input type="hidden" name="_wp_http_referer" value="/watch/my-account/">				<button type="submit" class="woocommerce-Button button" name="register" value="Register">Register</button>
    			</p>


		</form>
</div>
</div>
    <?php get_footer() ?>
