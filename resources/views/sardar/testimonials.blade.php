@extends('sardar.layout.front-index')
@section('title','Testimonials')
<style>
.modal-header {
    border: 0px !important;
    padding-bottom: 0px !important;
}
.modal-body {
    padding-top: 0px !important;
}

</style>

@section('custom-js')
<script>
	
$(document).ready(function () {
  $( ".lazyload" ).css('overflow', 'auto');
  $( ".loader" ).hide();
});

$(window).scroll(function () {
    var menu_height = $(".top_header").height();
	var logo_g = $(".logo-g").height();
	var Top_Details = $(".Top_Details").height();

    if($(window).scrollTop() > 140) {
      $(".navbar-design").addClass('sticky');
      $(".logo-g").show();
      $(".top_header").hide();
      $("body").addClass('sticky-menu-body');
      $("body").css({
        'position': 'relative',
        'top': 140,
        });
    } else {
      $(".top_header").show();
      
      $(".navbar-design").removeClass('sticky');
      $("body").removeClass('sticky-menu-body');
      $("body").css({
        'position': 'relative',
        'top': 0,
        });
    }
	var total = menu_height + Top_Details - logo_g;
		console.log($(window).scrollTop());
		
		console.log('total- ' + (total));
		

    if($(window).scrollTop() > menu_height - logo_g ) {
		
		$(".collection-slider").hide();
      $(".breadcrumb-left").css({
        'position': 'fixed',
        'top': logo_g + 54,
        });
	}else{
		$(".collection-slider").show();
      $(".breadcrumb-left").css({
        'position': 'relative',
        'top': 0,
        });
	}
  });
  

function goBack() {
  window.history.back();
}
$(".open-modal").on("hide.bs.modal", function () {
    // put your default event here
	alert('closed');

});

$('#myModal').on('hidden.bs.modal', function (e) {
  // do something...
	alert('closed');

})
$( document ).ready(function() {
  $(".open-modal").click(function(){
	  
    var data_image = $(this).attr('data-img');
    var data_type = $(this).attr('data-type');
    var data_title = $(this).attr('data-title');
    var data_clientName = $(this).attr('data-clientName');
    var data_short_description = $(this).attr('data-short_description');
    var data_full_description = $(this).attr('data-full_description');
    
		$('.card-img-top').attr('src',data_image);
		$('.card-title').html(data_title);
		$('.card-client').html(data_clientName);
		$('.short-description').html(data_short_description);
		$('.full-description').html(data_full_description);

		$('body').css({'padding': '0px'});


	if(data_type == 'video'){
		$('.video_block').show();
		$('.card-img-top').hide();
		$('.video_block').append(data_image);
	}else{
		$('.video_block').hide();
		$('.card-img-top').show();
		$('.card-img-top').attr('src',data_image);
	}
		
	}); 


	$(".open-modal2").click(function(){
	  
		$('.lazyload').css('padding-right', 0);
	  var data_image = $(this).attr('data-img');
	  var data_type = $(this).attr('data-type');
	  var data_title = $(this).attr('data-title');
	  var data_clientName = $(this).attr('data-clientName');
	  var data_short_description = $(this).attr('data-short_description');
	  var data_full_description = $(this).attr('data-full_description');
	  
		  $('.card-img-top').attr('src',data_image);
		  $('.card-title').html(data_title);
		  $('.card-client').html(data_clientName);
		  $('.short-description').html(data_short_description);
		  $('.full-description').html(data_full_description);
  
  
	  if(data_type == 'video'){
		  $('.video_block').show();
		  $('.card-img-top').hide();
		  $('.video_block').html(data_image);
	  }else{
		  $('.video_block').hide();
		  $('.card-img-top').show();
		  $('.card-img-top').attr('src',data_image);
	  }
	  
		  
	  }); 
	<?php
		if(isset($_REQUEST['testimonial'])){
		?>

		$("#{{$_REQUEST['testimonial']}}").click();
		<?php
		}
	?>
});
	$(".testimonial").addClass( "active");

</script>
@include('sardar.widget.testimonial-popup')
@endsection
@section('content')

<section class="Top_Details bg-white">
		<div class="container-fluid top-description">
			<div class="col-12">
				<div class="header-t mb-3">
					<h1 class="text-red">TESTIMONIALS</h1>
				</div>	

				<div class="w-100 py-4 px-3 TopContent">
					<p class="mb-2">{!! html_entity_decode($pageData->description) !!}</p>					
				</div>	

			</div>		
		</div>	
	</section>


	<section class="bg-white MyBreadcrumb">
		<div class="row m-0 px-2">
			<div class="col-sm-12 col-12 breadcrumb-left">
				<nav aria-label="breadcrumb " class="pl-2 border_breadcrumb" style="width: 62%;margin: 0 auto;">

				  <ol class="breadcrumb m-0 bg-white p-0">
				  <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
				  @if(getReffrel())
				    <li class="breadcrumb-item"><a href="{{getReffrel()['url']}}">{{getReffrel()['name']}}</a></li>
					@endif
				    <li class="breadcrumb-item active" aria-current="page">testimonials</li>

				  </ol>
				<div>
					<a class="btn btn-dark btn-sm btn-rounded" onclick="goBack()"> ❮ Back</a>
				</div>
						</nav>
					</div>	
					
				</div>		
	</section>


	<section class="Blogs_Box media_world bg-white">
		<div class="container-fluid">
			<div class="col-12">

				<div class="notinflatables_slider my_testimonial  row mb-4">
					@foreach($testimonials as $testimonial)
						<div class="col-lg-4 col-sm-6 p-2">
						<div class="inflatables">

						<a 
						
						data-target="#exampleModal2"
								data-toggle="modal" class="open-modal2"
						href="#" id="{{$testimonial->id}}"
									data-clientName="{{$testimonial->client_name}}" 
									data-title="{{$testimonial->title}}" 
									data-short_description="{{$testimonial->short_description}}" 
									data-type= '<?php if($testimonial->youtube_embed){echo 'video';}else{echo 'image';}?>'
									data-full_description = "{{$testimonial->full_description}}"
									<?php

									if($testimonial->youtube_embed){
										?>
										data-img = "{{$testimonial->youtube_embed}}"
										<?php
									}
									else{
										?>
										data-img = "{{url('web')}}/media/lg/{{$testimonial->image}}"
									<?php
									}									
									?>
									>
							<h3  class="InfaTitles" style="min-height: 76px;">{{$testimonial->client_name}}</h3>

							<div class="img_thumbnail testimonial_block m-auto" style="padding:2px;">
								<img style="background:none;padding: 6px;border-radius: 14px;"
								 src="{{url('web')}}/media/lg/{{$testimonial->image}}">

							</div>

							</a>

							
							<div class="mediaWordFooter">
								<p>{{$testimonial->short_description}}</p>
							</div>	
							<div class="col-12 mb-4 text-right mediaWorldFooter">	
								<a href="#" id="{{$testimonial->id}}"
									data-clientName="{{$testimonial->client_name}}" 
									data-title="{{$testimonial->title}}" 
									data-short_description="{{$testimonial->short_description}}" 
									data-type= '<?php if($testimonial->youtube_embed){echo 'video';}else{echo 'image';}?>'
									data-full_description = "{{$testimonial->full_description}}"
									<?php

									if($testimonial->youtube_embed){
										?>
										data-img = "{{$testimonial->youtube_embed}}"
										<?php
									}
									else{
										?>
										data-img = "{{url('web')}}/media/lg/{{$testimonial->image}}"
									<?php
									}									
									?>
									
								data-target="#exampleModal"
								data-toggle="modal" 
								class="red_btn open-modal">READ NOW</a>
							</div>	

						</div>
						</div>

					@endforeach
					<!-- <div class="col-lg-4 col-sm-6 p-2 ">
						<div class="inflatables video-modal">
							<h3 class="InfaTitles">{{$testimonial->client_name}}</h3>
							<div class="img_thumbnail m-auto">
								<img src="{{url('web')}}/media/lg/{{$testimonial->image}}">
							</div>
							<div class="mediaWordFooter">
								<p>{{$testimonial->short_description}}</p>
							</div>	
							<div class="col-12 mb-4 text-right">	
								<a href="#" 
									data-clientName="{{$testimonial->client_name}}" 
									data-title="{{$testimonial->title}}" 
									data-short_description="{{$testimonial->short_description}}" 
									data-img = "{{url('web')}}/media/lg/{{$testimonial->image}}"
									data-full_description = "{{$testimonial->full_description}}"
								data-target="#exampleModal"  data-toggle="modal" class="red_btn open-modal">READ NOW</a>
							</div>	
						</div>
						</div> -->

				</div>	

			</div>	
		</div>	
	</section>

@endsection