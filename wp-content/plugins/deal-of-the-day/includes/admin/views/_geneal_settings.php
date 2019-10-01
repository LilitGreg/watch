<style type="text/css">
    .previewtheme{
    display: none;
    position: relative;
}


.theme-prview td a:hover>div{
    position: absolute;
display: block;
top: 0;
}
</style>

<div class="dod_container">
    <div class="message updated fade" style="display: <?php echo $msg == '' ? 'none' : 'block';?>;"><p><?php echo $msg?></p></div>
<?php include '_header.php';?>
<div class="dod_wrap">
    <form method="post" id="mainform" action="" enctype="multipart/form-data">
        <h2><?php esc_html_e('General Settings','dod'); ?></h2>
        <table class="form-table">

            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Deals Page Title','dod'); ?></label>
                    </th>
                    <td class="">
						<input type="text" name="page_title" value="<?php echo $page->post_title;?>" placeholder="">
                        <a href="<?php echo site_url()?>?page_id=<?php echo get_option('dod_page_id')?>" target="_blank"><?php esc_html_e('View Page','dod'); ?> </a>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Select Theme','dod'); ?></label>
                    </th>
                    <td class="theme-prview">
                        <?php global $dealofday; 
                        ?>
                        <table>
                            <tr>
                            <td><a id="theme-1" href="javscript:" theme_id ="theme-1">

                                <?php if(get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) && get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) == "theme-1") {?>  <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-1-tick.jpg" />  <?php } else { ?>
                                <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-1.jpg" />
                                <?php } ?>
                            </a></td>
                            <td><a id="theme-2" href="javscript:" theme_id ="theme-2">
                             <?php if(get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) && get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) == "theme-2") {?>  <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-2-tick.jpg" />  <?php } else { ?>
                               <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-2.jpg" />
                                <?php } ?>
                                
                            </a></td>
                            <td><a id="theme-3" href="javscript:" theme_id ="theme-3">
                                

                                 <?php if(get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) && get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) == "theme-3") {?>  <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-3-tick.jpg" />  <?php } else { ?>
                               <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-3.jpg" />
                                <?php } ?>


                                
                            
                            </a></td>
                            <td><a id="theme-4" href="javscript:" theme_id ="theme-4">
                                <?php if(get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) && get_post_meta(get_option('dod_page_id'), 'dod_page_theme', true) == 'theme-4') {?>  <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-4-tick.jpg" />  <?php } else { ?>
                              <img src="<?php echo $dealofday->plugin_url(); ?>/assets/images/thumb-theme-4.jpg" />
                                <?php } ?>

                                
                            
                            </a></td>
                        </tr></table>

                         <script type="text/javascript" >
                            jQuery(document).ready(function($) {
                                $(".theme-prview table td > a").click(function(){
                            var themeid = this.id;

                            var data = {
                                'action': 'dod_select_theme',
                                'dataid': themeid
                            };

                            $.post(ajaxurl, data, function(data) {
                            

                                    $("a#"+data).html('<img src="http://localhost/shopping-today/wp-content/plugins/deal-of-the-day/assets/images/thumb-'+data+'.jpg">')

                                    $("a#"+themeid).html('<img src="http://localhost/shopping-today/wp-content/plugins/deal-of-the-day/assets/images/thumb-'+themeid+'-tick.jpg">');
                                
                                
                            });

                                });

                                
                            });
                        </script>
                        <select name="page_theme" style="display: none;">
                        

                        <?php
                        foreach ($themes as $title => $value) {
    $selected = '';
    if ($selected_page_theme == $value) {
        $selected = 'selected="selected" ';
    }
    echo "<option value=\"$value\" $selected  >$title</option>";
}
?>
                    </select>
                </td>
            </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Select Style','dod'); ?></label>
                    </th>
                    <td class="">
                        <select name="page_template" >
                        <option value="default"><?php esc_html_e('Default Template','dod'); ?></option>";
<?php
foreach ($templates as $title => $value) {
	$selected = '';
	if ($selected_template == $value) {
		$selected = 'selected="selected" ';
	}
	echo "<option value=\"$value\" $selected  >$title</option>";
}

?>
                        </select>
                        <?php

                        //setting up default values
                if($button_text == ''){
                    $button_text = 'Buy Now';
                }
                if($button_width == ''){
                    $button_width = 100;
                }
                if($button_height == ''){
                    $button_height = 20;
                }

                ?>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Button Text','dod'); ?></label>
                    </th>
                    <td class="">
                        <input type="text" name="button_text" value="<?php echo esc_attr($button_text); ?>" >
                    </td>
                </tr>

                 <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Button Width','dod'); ?></label>
                    </th>
                    <td class="">
                        <input type="text" name="button_width" value="<?php echo esc_attr($button_width); ?>" ><label><?php esc_html_e('PX',''); ?></label>
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Button height','dod'); ?></label>
                    </th>
                    <td class="">
                        <input type="text" name="button_height" value="<?php echo esc_attr($button_height); ?>" ><label><?php esc_html_e('PX',''); ?></label>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Button Background','dod'); ?></label>
                    </th>
                    <td class="">
						<input type="text" name="button_background" value="<?php echo esc_attr($button_background); ?>" class="dod-color-picker" >
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Button Text Color','dod'); ?></label>
                    </th>
                    <td class="">
                        <input type="text" name="button_txt_color" value="<?php echo esc_attr($button_txt_color); ?>" class="dod-color-picker" >
                    </td>
                </tr>


                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for=""><?php esc_html_e('Custom CSS','dod'); ?></label>
                    </th>
                    <td class="">
                        <textarea name="custom_css" cols="80" rows="10"><?php echo esc_attr($custom_css); ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            
<?php if (!isset($GLOBALS['hide_save_button'])):?>
            <input name="save-settings" class="button-primary" type="submit" value="<?php _e('Save changes', 'deal-of-day');?>" />
<?php endif;?>
        </p>
    </form>
</div>
</div>