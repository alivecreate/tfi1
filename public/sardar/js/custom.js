
$('.two_controls').click(function (e) { 
    $('.top-form').toggle();
});

$('.magnify-image').click(function () { 
  // alert('click');
});


// $('.magnify-button-prev').click(function () { 
//   // alert('left');
//   setTimeout(()=>{
//     $('.magnify-image').css({'left': 0});
//     alert('left');
//   },100)
// });


// $('.my_slider_block .Biginflatables .img_thumbnail img').click(function (e) { 
//   // $('.magnify-button-close').trigger('click');

//   setTimeout(()=>{
//   alert('click');
//   $('.magnify-image').css('height', '100%');
//   // $('.magnify-image').css('width', 'auto');
//   $('.magnify-image').css({'width': 'auto', 'left': 0});
//   },10)
  
// });

$('.magnify-maximize').not('.magnify-image').click(function (e) { 
  $('.magnify-button-close').trigger('click');
});

// $(window).scroll(function () {
//     if($(window).scrollTop() > 705) {
//       $("#head").addClass('sticky');
//     } else {
//       $("#head").removeClass('sticky');
//     }
//   });

// $('#exampleModal').click(function (e) { 
  
//   alert('c');
// });

$(document).ready(function(){


  $(".navbar-toggler").click(function(){
    if($("body").width() <= 992){
    $("#mySidenav").animate({
       width: "toggle"
     });
     $('.top-form').hide();
    }

  });
  $(".closeNavbtn, .two_controls").click(function(){
    if($("body").width() <= 992){
    $("#mySidenav").animate({
       width: "toggle"
     });
    }

  });

});

$(document).on('hide.bs.modal',"#exampleModal, #exampleModal2", function () {
  $(".lazyload").addClass('pr-0');
});

  setTimeout(() => {
	
    $(".gsc-search-button .gsc-search-button-v2").addClass( "btn find-btn");
    $(".gsc-search-button .gsc-search-button-v2").text('Find');
  
  }, 1200);

  $('.navbar-design .nav-item').not(".no-effect").click(function () { 
    // alert('clcik 3');
    $('.navbar-design .nav-item').not(".no-effect").removeClass('active');
    $(this).addClass('active');
    
  });
  $('.top-buttons').click(function () { 
    $('.top-buttons').removeClass('active');
    $(this).addClass('active');
    
  });
  $('.top-buttons').focus(function (e) { 
    // alert('clock');
    $('.top-buttons').removeClass('activeTitle');
    $(this).addClass('activeTitle');
    
  });
  $('.product_internal_title').click(function (e) { 
    // alert('clock');
    $('.product_internal_title').removeClass('activeTitle');
    $(this).addClass('activeTitle');
    
  });
  
  
  // $(".gsc-search-button .gsc-search-button-v2").addClass( "btn find-btn");
  // $(".gsc-search-button .gsc-search-button-v2").text('Find');

  
//   $('.item-block').hover(function () {
//     $(this).children('.bottom_links').css('background', 'red');
//     // over
    
//   }, function () {
//     // out
//     $(this).children('.bottom_links').css('background', 'white');
//   }
// );


$(".clickExplore").hover(function () {
  $(this).children('a').css('color', 'white');
  // over
  
}, function () {
  $(this).children('a').css('color', 'black');
  // out
}
);

$(".infa_bg").hover(function () {
  $(this).children('a').css('color', 'white');
  // over
  
}, function () {
  $(this).children('a').css('color', 'black');
  // out
}
);

$(".explore-now-title").hover(function () {
  // over
  
}, function () {
  // out
}
);


// $('.slick-slide').hover(function () {
//   alert('test');
//   // $(this).children('.infa_bg').addClass('activeTitle');
//   // over
  
// }, function () {
//   alert('no');

//   // $(this).children('.infa_bg').removeClass('activeTitle');
//   // out
// }
// );

$('.clickExplore', '.top-buttons', '.c_explores a').hover(function () {
  $(this).addClass('hoverTitle');
  // over
  
}, function () {
  // out
}
);



$(".blur_box").width(function () {

  // $(this).css('height', $(this).width());
  
  // alert($(this).width());

  // over
  
});

$(".blur_box").width(function () {

  // $(this).child('.blur_original').css('height', $(this).width());
  $(this).child('.blur_original').css('object-fit', 'cover');
  
  // alert($(this).width());

  // over
  
});


$(".open-modal").click(function(){
  //   alert('test');
  var data_image = $(this).attr('data-image');
  var data_type = $(this).attr('data-type');
  var data_title = $(this).attr('data-title');
  var data_clientName = $(this).attr('data-clientName');
  var data_short_description = $(this).attr('data-short_description');
  var data_full_description = $(this).attr('data-full_description');
  var data_product_url = $(this).attr('data-product-url');

  $('.card-product-url').val(data_product_url);
  $('.card-image').val(data_image);
  $('.card-title').val(data_title);
  $('.card-client').html(data_clientName);
  $('.short-description').html(data_short_description);
  $('.full-description').html(data_full_description);


  
});       



//  $(".slideshow > img:gt(0)").hide();
//   setInterval(function() {
//   $('.slideshow > img:first')
//     .fadeOut(1000)
//     .next()
//     .fadeIn(1000)
//     .end()
//     .appendTo('.slideshow');
// }, 200);



//   setInterval(function() {
// $( ".slideshow" ).each(function( index ) {

//   // $(".slideshow > img:gt("+index+")").hide();
  
//   $(this).children("img:gt(0)").hide();

//     $(this).children("img:first")
//     .fadeOut(1000)
//     .next()
//     .fadeIn(1000)
//     .end()
//     .appendTo('.slideshow');
//   }, 3000);
// });





$('.carousel .vertical .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=1;i<2;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});


  
  $( ".breadcrumb-item" ).last().addClass( "active");
  $( ".breadcrumb-item a:before" ).last().css( "background", "none");



