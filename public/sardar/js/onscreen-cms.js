
$(document).ready(function(){

  $('.navbar-brand, .logo-g, .content_banners').each(function(){
    $(this).append(`<a href="`+$(this).attr('data-link')+`"class='onscreen-logo' onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a>`);

});

$('.logo-g, .home, .product, .about, .testimonial, .video, .blog, .contact').each(function(){
  $(this).append(`<a href="`+$(this).attr('data-link')+`"class='onscreen-menu' onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a>`);
});

$('.product_title_main').each(function(){
  $(this).append(`<div class="row onscreen-product-title"><a href="`+$('.route-category-create').text()+`"onclick="window.open('`+$('.route-category-create').text()+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a><a href="`+$('.route-category-list').text()+`"onclick="window.open('`+$('.route-category-list').text()+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fas fa-trash-alt'></i></a>`);
});

$('.onscreen_media_testimonial_title').each(function(){
  $(this).prepend(`<div class="row onscreen-media-title-link"><a href="`+$('.route-testimonial-create').text()+`"onclick="window.open('`+$('.route-testimonial-create').text()+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fas fa-trash-alt'></i></a>`);
});

$('.onscreen_media_video_title').each(function(){
  $(this).prepend(`<div class="row onscreen-media-video-link"><a href="`+$('.route-video-create').text()+`"onclick="window.open('`+$('.route-video-create').text()+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fas fa-trash-alt'></i></a>`);
});


$('.onscreen_media_blog_title').each(function(){
  $(this).prepend(`<div class="row onscreen-media-blog-link"><a href="`+$('.route-blog-create').text()+`"onclick="window.open('`+$('.route-blog-create').text()+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fas fa-trash-alt'></i></a>`);
});



$('.onscreen-product-image').each(function(){
  $(this).append(`<div class="row onscreen-product-image-slider"><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fa fa-plus'></i></a><a href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a><a href="`+$('.route-category-list').text()+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='fas fa-trash-alt'></i></a>`);
});

$('.onscreen_top_inflatable').each(function(){
  $(this).append("<a href="+$(this).attr('data-link')+" class='onscreen-edit2'><i class='far fa-edit'></i></a>");
});

$('.about_part, .our_clients').each(function(){
  $(this).append(`<a class='onscreen-block' href="`+$(this).attr('data-link')+`"onclick="window.open('`+$(this).attr('data-link')+`', 'toolbar=no, location=no','left=350,width=800,height=860'); return false;"> <i class='far fa-edit'></i></a>`);
});


    $('.testOnload').append("<a href="+$('.testOnload').attr('data-link')+" class='onscreen-logo'><i class='far fa-edit'></i></a>")
});



$('.navbar-brand, .logo-g, .content_banners, .home, .product, .about').each(function(){
  $(this).child("data-link").hide();
});