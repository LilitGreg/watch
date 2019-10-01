jQuery(document).ready(function (){

    jQuery('.product-categories').find(".cat-parent > a").append(jQuery('<img>', {

   }));

      jQuery('.product-categories').find(".cat-parent").click(function(event){
           //jQuery(this).prev(".sub-menu").toggle();
             //jQuery("body").css("background-color","red");
            //jQuery(this).find("a:before").css("content", "\f106");
            jQuery(this).toggleClass("arrow-top");
            jQuery(this).find(".children").toggleClass("hide");
              //event.preventDefault();
      })


    var colors =jQuery(".woocommerce-widget-layered-nav-list").find(".woocommerce-widget-layered-nav-list__item a").text();


    jQuery.each(["Yellow", "Black", "Red"], function( index, value ) {

      jQuery(".woocommerce-widget-layered-nav-list").find(".woocommerce-widget-layered-nav-list__item:nth-child(" + index +") > a").css({"background-color":value,"border-color": value});
    });


  jQuery(".widget_product_tag_cloud .tagcloud").addClass("clearfix");

  jQuery ('.slider').owlCarousel ( {
        margin : 0 ,
        navText : false ,
        items : 1,
        nav : true,
        loop: true

    });

  // jQuery('#woocommerce_top_rated_products-2 .product_list_widget').append("<div class='owl-dots' style=''><div class='owl-dot active'><span></span></div><div class='owl-dot'><span></span></div> +
  // + <div class='owl-dot'><span></span></div></div>");

  var length = jQuery('#woocommerce_top_rated_products-2 .product_list_widget li').size();

  //console.log(length);

  //jQuery('#woocommerce_top_rated_products-2 .product_list_widget').append("<div><ul class='navigation'><li> <a> . </a> </li><li> <a> . </a> </li><li> <a> . </a> </li> </ul> </div>");


  jQuery('#woocommerce_top_rated_products-2 .product_list_widget').append("<div><ul class='navigation'> </ul> </div>");

   var i;
   for (i = 0; i < length; ++i) {
     jQuery('#woocommerce_top_rated_products-2 .product_list_widget .navigation').append("<li> <a href='#'> . </a> </li>");
   }

  jQuery('#woocommerce_top_rated_products-2 .product_list_widget .navigation li a').on("click", function(event){

    event.preventDefault();
  })


 jQuery('#woocommerce_top_rated_products-2  .product_list_widget > li > a').append("<div class='back-gray-widget'> </div");


 jQuery('.home  .products > .product > .woocommerce-LoopProduct-link').append("<div class='back-gray-widget'> </div");

   // var lengthnav = jQuery('#woocommerce_top_rated_products-2 .product_list_widget .navigation li').size();
   //
   // console.log(lengthnav);

   //lengthnav==length;
   // var i;
   //  for (i = 0; i < length; ++i) {
   //     jQuery('#woocommerce_top_rated_products-2 .product_list_widget li').eq( i ).removeClass( "blue" );
   //      jQuery('#woocommerce_top_rated_products-2 .product_list_widget li').eq( i ).addClass( "blue" );
   //  }


   jQuery('#woocommerce_top_rated_products-2 .product_list_widget li').eq( 1 ).addClass("active");

    jQuery('.navigation li').on("click", function(){

        var index = jQuery( ".navigation li" ).index( this );

        // console.log(index);

         jQuery('#woocommerce_top_rated_products-2 .product_list_widget > li').removeClass("active");
         jQuery('#woocommerce_top_rated_products-2 .product_list_widget li').eq( index ).addClass("active");


    });



    jQuery(".container .tab-content-portfolio").eq( 0 ).addClass("active");

    jQuery( ".portf-cat-lists li:first-child" ).addClass("active-tab");

    jQuery(".portf-cat-lists li").on("click", function(){

        var indexcat = jQuery( ".portf-cat-lists li" ).index( this );


        //console.log(indexcat);

        jQuery(".container .tab-content-portfolio").removeClass("active");

        jQuery(".container .tab-content-portfolio").eq( indexcat ).addClass("active");


          jQuery( ".portf-cat-lists li" ).removeClass("active-tab");
          jQuery(this).addClass("active-tab");


    });


  jQuery(".content-tags .content-tag").eq( 0 ).addClass("active");

  jQuery( ".product-tags li:first-child" ).addClass("active-tag-tab");

    jQuery (".product-tags li").on("click", function(event){

      var indextag = jQuery( ".product-tags li" ).index( this );

      jQuery(".content-tags .content-tag").removeClass("active");

      jQuery(".content-tags .content-tag").eq( indextag ).addClass("active");


      jQuery( ".product-tags li" ).removeClass("active-tag-tab");
      jQuery(this).addClass("active-tag-tab");

        event.preventDefault();

    });

    // jQuery(".container tab-content-portfolio").eq( 0 ).addClass("active");
    //
    // jQuery(".portf-cat-lists li").on("click", function(){
    //
    //     var indexcat = jQuery( ".portf-cat-lists li" ).index( this );
    //
    //     //console.log(indexcat);
    //
    //     jQuery(".container tab-content-portfolio").removeClass("active");
    //
    //     jQuery(".container tab-content-portfolio").eq( indexcat ).addClass("active");
    //
    // });



    // jQuery("#close").on('click', function(){
    //   jQuery("body").css("background-color", "red");
    //     //jQuery(".popup-view").addClass("hide");
    //
    //  });

    jQuery(".products .product .icon-view").on("click", function(){


      var imgsrc = jQuery(this).siblings('.woocommerce-LoopProduct-link').find('img').attr('src');

      console.log(imgsrc);

      // jQuery('.products').append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="wp-content/uploads/2019/02/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');
      //
      // jQuery('.products .popup-view .img-pop').attr("src", imgsrc);


      jQuery(this).parents(".products").append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="../../wp-content/themes/watch/images/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');

      jQuery(this).parents(".products").find('.popup-view .img-pop').attr("src", imgsrc);


    });

 jQuery(".tax-product_cat .products .product .icon-view").on("click", function(){


   var imgsrc = jQuery(this).siblings('.woocommerce-LoopProduct-link').find('img').attr('src');

   console.log(imgsrc);

   // jQuery('.products').append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="wp-content/uploads/2019/02/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');
   //
   // jQuery('.products .popup-view .img-pop').attr("src", imgsrc);


   jQuery(this).parents(".products").append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="../../wp-content/themes/watch/images/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');

   jQuery(this).parents(".products").find('.popup-view .img-pop').attr("src", imgsrc);


 });


 jQuery(".home .products .product .icon-view").on("click", function(){


   var imgsrc = jQuery(this).siblings('.woocommerce-LoopProduct-link').find('img').attr('src');

   console.log(imgsrc);

   // jQuery('.products').append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="wp-content/uploads/2019/02/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');
   //
   // jQuery('.products .popup-view .img-pop').attr("src", imgsrc);


   jQuery(this).parents(".products").append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="wp-content/themes/watch/images/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');

   jQuery(this).parents(".products").find('.popup-view .img-pop').attr("src", imgsrc);


 });


 jQuery(".post-type-archive .products .product .icon-view").on("click", function(){


   var imgsrc = jQuery(this).siblings('.woocommerce-LoopProduct-link').find('img').attr('src');

   console.log(imgsrc);

   // jQuery('.products').append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="wp-content/uploads/2019/02/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');
   //
   // jQuery('.products .popup-view .img-pop').attr("src", imgsrc);


   jQuery(this).parents(".products").append('<div class="popup-view" id="popup-view">   <a href="#" id="close">  <img src="../wp-content/themes/watch/images/close.png" alt=""> </a>   <img class="img-pop" src=" " />  </div>');

   jQuery(this).parents(".products").find('.popup-view .img-pop').attr("src", imgsrc);


 });




 jQuery('body').on('click', '#close', function(){

       jQuery(".popup-view").addClass("hide");

  });


jQuery("#media_gallery-2").addClass("clearfix");
jQuery("#media_gallery-2 a").click(function(event){
 event.preventDefault();
});

jQuery(".cart-items .cart_totals a").addClass("btn btn-theme");
jQuery(".cart-items .cart_totals a").html("Checkout");


 jQuery('.items-checkout').on('click', function(){
   jQuery('.cart-items').toggleClass("active");
});


// jQuery(".archive .products").removeClass("columns-2");
// jQuery(".archive .products").addClass("columns-3");
// // jQuery(".archive .products li:nth-child(2n)").removeClass("last");
// //
// // jQuery(".archive .products li:nth-child(3n)").addClass("last");
//
// jQuery(".archive .products li:nth-child(3n)").addClass("first");
// jQuery(".archive .products li:nth-child(2n)").removeClass("first");



// jQuery(".archive .products li:nth-child(4n)").addClass("clear");
// jQuery(".archive .products li").css("clear","none");

  // jQuery('.archive .product li').append($('<img class="eyes">', {
  //     src : "/wp-content/uploads/2019/01/arrowr.png",
  //     width : 20,
  //     height : 20,
  //     alt : "Test Image",
  //  }));


  // var meta_image_frame;
  //       // Runs when the image button is clicked.
  //       $('.image-upload').click(function (e) {
  //         // Get preview pane
  //         var meta_image_preview = $(this).parent().parent().children('.image-preview');
  //         // Prevents the default action from occuring.
  //         e.preventDefault();
  //         var meta_image = $(this).parent().children('.meta-image');
  //         // If the frame already exists, re-open it.
  //         if (meta_image_frame) {
  //           meta_image_frame.open();
  //           return;
  //         }
  //         // Sets up the media library frame
  //         meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
  //           title: meta_image.title,
  //           button: {
  //             text: meta_image.button
  //           }
  //         });
  //         // Runs when an image is selected.
  //         meta_image_frame.on('select', function () {
  //           // Grabs the attachment selection and creates a JSON representation of the model.
  //           var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
  //           // Sends the attachment URL to our custom image input field.
  //           meta_image.val(media_attachment.url);
  //           meta_image_preview.children('img').attr('src', media_attachment.url);
  //         });
  //         // Opens the media library frame.
  //         meta_image_frame.open();
  //       });

})



window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
     if(document.getElementById("masthead")) {
       document.getElementById("masthead").classList.add("sticky-header");
       document.getElementById("header-top").style.display ="none";
    }
  } else {
     document.getElementById("masthead").classList.remove("sticky-header");
        document.getElementById("header-top").style.display ="block";
  }
}
