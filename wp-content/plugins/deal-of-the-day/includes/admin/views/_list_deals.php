<div class="dod_container">
<?php include '_header.php';?>

<div class="products_search">
    <h2><?php esc_html_e('Add New deal','dod'); ?></h2>
    <p id="errmsg"><font color="red"></font></p>
    <table class="form-table"><tbody>
        <tr>
             <th><label for="dod_start_date"><?php esc_html_e('Select Products','dod'); ?></label></th>
            <td><input type="text" placeholder="Type here search prorducts" name="dod_choose_prod" id="dod_choose_prod">
            <div class="search_results"></div>
            <div class="choosed_products"><ul></ul></div>
            <input type="hidden" name="dod_ids[]" id="dod_ids" >
            </td>
        </tr>
                        <tr>
                        <th><label for="dod_start_date"><?php esc_html_e('Start Date','dod'); ?></label></th>
                        <td><input type="text" class="datepicker" name="dod_start_date" id="dod_start_date" value="" size="30">
                                    <br><span class="description"><?php esc_html_e('Deal start date','dod'); ?></span></td></tr><tr>
                        <th><label for="dod_end_date"><?php esc_html_e('End Date','dod'); ?></label></th>
                        <td><input type="text" class="datepicker" name="dod_end_date" id="dod_end_date" value="" size="30">
                                    <br><span class="description"><?php esc_html_e('Deal End date','dod'); ?></span></td></tr><tr>
                        <th><label for="dod_notes"><?php esc_html_e('Notes','dod'); ?></label></th>
                        <td><textarea name="dod_notes" id="dod_notes" cols="60" rows="4"></textarea>
                                <br><span class="description"><?php esc_html_e('Special Notes.','dod'); ?></span></td></tr>
                            <tr><td>&nbsp;</td><td><button id="dod_add_deal"><?php esc_html_e('Submit','dod'); ?></button></td></tr>
                            </tbody></table>
<script type="text/javascript">
                    jQuery(function() {jQuery(".datepicker").datepicker(  {onSelect: function (date) { jQuery(this).removeClass("error"); jQuery(this).next().hide();  } } );jQuery(".datepicker").datepicker(  {onSelect: function (date) { jQuery(this).removeClass("error"); jQuery(this).next().hide();  } } );});
            </script>


</div>
<style type="text/css">
    .last-row th {border-top: 1px solid #e1e1e1;}
    #sortable { list-style-type: none; margin:  0; padding: 0; width: 100%; }
    #sortable ul { margin-left:20px; list-style: none; }
    #sortable li { padding: 4px 0px; margin: 0px 0px; -moz-border-radius:6px; height: 45px;}
    #sortable li.placeholder{border: dashed 2px #ccc;height:45px;}
    .row-action{ display: none; }
    .row-action .id{ color: #666; }
    #sortable li:hover .row-action{ display: block;}
    .products-list{ background: #fff ; border: 1px solid #e5e5e5; -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);box-shadow: 0 1px 1px rgba(0,0,0,.04); }
    .products-list>.thead{  min-height: 35px; background: #fff;line-height: 35px; border-bottom: 1px solid #ddd; }
    .products-list .thead:last-child{  min-height: 35px; background: #fff;line-height: 35px; border-top: 1px solid #ddd; }
    .products-list .th{ float: left; width: 24%; padding: 0 5px;}
    .ui-sortable .tr{ width: 100%; clear: both; min-height: 25px;}
    .ui-sortable .tr div{ width: 24%; float: left; line-height: 25px;  padding: 0px 5px;}
    .products-list .reorder{ cursor: move;}
    div.error, div.updated{ margin-bottom: 8px;}
    .red{ border:1px solid red !important;}
</style>
  <script type="text/javascript" >
    jQuery(document).ready(function($) {

        var dod_pids_arr = [];
        $("#dod_choose_prod").keyup(function ()  {
        
         var $input = $('#dod_choose_prod');
         var val = $(this).val().trim();
         val = val.replace(/\s+/g, '');
         var query = $(this).val();

         if(val.length >= 3) { //for checking 3 characters
                

            var data = {
                'action': 'dod_product_search',
                'query': query
            };

            $.post(ajaxurl, data, function(data) {
                $('.search_results').html(data);
            });


         }

    });

    

        $(document).on("click", ".dod_select_product" , function() {

            dod_pids_arr.push($(this).attr('product-id'));
        

            $(".choosed_products ul").append("<li id='"+$(this).attr('product-id')+"'><a class='remove_product' title='remove item' href='javascript:' product-id='"+$(this).attr('product-id')+"'><span>x</span></a>"+$(this).text()+"</li>");
           
           $('.search_results').empty();
         
        });


        $("input#dod_choose_prod").bind('keyup', function() {
            $(this).removeClass('red');
        });

        $("input#dod_start_date").bind('blur', function() {
            $(this).removeClass('red');
        });

        $("input#dod_end_date").bind('blur', function() {
            $(this).removeClass('red');
        });
            

        $("button#dod_add_deal").click(function(){


            

             var data = {
                'action': 'dod_add_deal',
                'dod_start_date': $("input[name=dod_start_date]").val(),
                'dod_end_date': $("input[name=dod_end_date]").val(),
                'dod_notes': $("dod_notes").val(),
                'products': dod_pids_arr,
            };
            $.post(ajaxurl, data, function(data) {
                if(data == 'products'){
                    $("#errmsg font").text("please choose at least one product");
                    $("input#dod_choose_prod").addClass('red');
                    return false;
                };
                if(data == 'datenotfound'){
                $("#errmsg font").text("please select start date and enddate");
                if( $("input#dod_start_date").val() == ""){
                    $("input#dod_start_date").addClass('red');
                }

                 if( $("input#dod_end_date").val() == ""){
                     $("input#dod_end_date").addClass('red');
                }
                
               
                    return false;
               };

               location.reload();
            });


        });

        $(".remove_deal").click(function(){
            var data = {
                'action': 'dod_remove_deal',
                'product_id': $(this).attr('product-id')
            };
            $.post(ajaxurl, data, function(data) {
               $("#item_"+data).remove();
            });
        });

        $(document).on("click", ".choosed_products ul li a.remove_product" , function() {

            
            var index = dod_pids_arr.indexOf($(this).attr('product-id'));

            if (index > -1) {
                dod_pids_arr.splice(index, 1);
            }

           $(".choosed_products ul li#"+$(this).attr('product-id')).remove();


    
        });



        var deal_id = 0;
        $('.dod_deal_status').change(function() {
            deal_id = $(this).val();
            var data = {
                'action': 'dod_update_deal_status',
                'deal_id': deal_id
            };
            $.post(ajaxurl, data, function(data) {
                if( data == 1 ){
                    $('#row_' + deal_id ).css('background-color', '#AAF46B');
                    setTimeout(function(){$('#row_' + deal_id ).css('background-color', '#fff');} , 200 )
                }else{
                    $('#row_' + deal_id ).css('background-color', '#FA8989');
                    setTimeout(function(){$('#row_' + deal_id ).css('background-color', '#fff');} , 200 )
                }
            });
        });
         $('.featured_deal').change(function() {
            deal_id = $(this).val();
            var data = {
                'action': 'dod_featured_deal',
                'deal_id': deal_id
            };
            $.post(ajaxurl, data, function(data) {
                if( data == 1 ){
                    $('#row_' + deal_id ).css('background-color', '#AAF46B');
                    setTimeout(function(){$('#row_' + deal_id ).css('background-color', '#fff');} , 200 )
                }else{
                    $('#row_' + deal_id ).css('background-color', '#FA8989');
                    setTimeout(function(){$('#row_' + deal_id ).css('background-color', '#fff');} , 200 )
                }
            });
        });

        jQuery("#sortable").sortable({
            'tolerance':'intersect',
            'cursor':'pointer',
            'items':'li',
            'placeholder':'placeholder',
            'nested': 'ul',
        });
        jQuery("#sortable" ).on( "sortupdate", function( event, ui ) {
            jQuery("#sortable").disableSelection();
            jQuery.post( ajaxurl, { action:'update_deals_order', order:jQuery("#sortable").sortable("serialize") }, function() {
                jQuery("#ajax-response").html('<div class="messadge updated fade"><p><?php _e("Deals reordered", "deal-of-day")?></p></div>');
                jQuery("#ajax-response div").delay(2000).fadeOut("slow");
            });
         } );
    });
</script>
<h2><?php esc_html_e('Products in deal','dod'); ?></h2>
<p>
     <a href="<?php echo site_url()?>?page_id=<?php echo get_option('dod_page_id')?>" target="_blank"><?php esc_html_e('View Deals Page','dod'); ?></a>

</p>
<div id="ajax-response"></div>
<?php
if (count($query->posts)) {?>
<div class="products-list">
        <div class="thead">
          <div class="th"><strong><?php esc_html_e('Product','dod'); ?> </strong></div>
            <div class="th"><strong><?php esc_html_e('Deal status','dod'); ?></strong></div>
            <div class="th"><strong><?php esc_html_e('Featured Deal','dod'); ?></strong></div>
            <div class="th"><strong><?php esc_html_e('re-order','dod'); ?></strong></div>
        </div>
    <ul id="sortable" class="ui-sortable">
<?php
global $dealofday;
    foreach ($query->posts as $key => $p) {
        $dod_active_deal = get_post_meta($p->ID, 'dod_active_deal');
        $dod_featured_deal = get_post_meta($p->ID, 'dod_featured_deal');
        $hold = array_shift($dod_active_deal);
        $is_featured = array_shift($dod_featured_deal);
        ?>
            <li id="item_<?php echo $p->ID;?>">
                <div id="row_<?php echo $p->ID;?>" class="tr">
                 <!--    <div><?php echo $p->ID;?></div> -->
                    <div>
                    <strong><?php echo $p->post_title;?></strong>
                        <span class="row-action">
                            <span class="id">ID: <?php echo $p->ID;?> |</span>
                            <span class="edit"><a href="<?php echo site_url();?>/wp-admin/post.php?post=<?php echo $p->ID;?>&amp;action=edit" target="_blank">Edit</a>|</span>
                            <span class="view"><a href="<?php echo get_permalink($p->ID);?>" target="_blank"> <?php esc_html_e('View','dod'); ?> </a>|</span>
                             <span class="remove"><a href="javascript:" title="remove from deal" product-id="<?php echo $p->ID; ?>" class="remove_deal" target="_blank"> <?php esc_html_e('Remove','dod'); ?> </a></span>
                        </span>
                    </div>
                    <div> <?php esc_html_e('Active Deal','dod'); ?>  <input type="checkbox" name="<?php echo $p->ID . 'dod_active_deal'?>" class="dod_deal_status" value="<?php echo $p->ID;?>" <?php is_checked($hold);?> ></div>
                    <div> <input type="checkbox" name="<?php echo $p->ID . 'featured_deal'?>" class="featured_deal" value="<?php echo $p->ID;?>" <?php is_checked($is_featured);?> ></div>
                    <div class="reorder"> <img src="<?php echo $dealofday::plugin_url()?>/assets/images/move.jpg" alt=""></div>
                </div>
            </li>
<?php }?>
</ul>
         <div class="thead">
            <div class="th"><strong><?php esc_html_e('Page','dod'); ?></strong></div>
            <div class="th"><strong><?php esc_html_e('Deal status','dod'); ?></strong></div>
            <div class="th"><strong><?php esc_html_e('Featured Deal','dod'); ?></strong></div>
            <div class="th"><strong><?php esc_html_e('re-order','dod'); ?></strong></div>
        </div>
    </div>

<?php } else {
       echo '<p>' . esc_html('No Products added to deals yet.','dod') . '</p>';
}?>
<?php
function is_checked($hold) {
    echo $hold == 'Yes' ? 'checked' : '';
}

?>
</div>