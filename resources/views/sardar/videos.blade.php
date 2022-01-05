@extends('sardar.layout.front-index')
@section('title','Videos')
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
	$(".video").addClass( "active");
	$(".video-modal");



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
  

$(document).ready(function () {
  $( ".lazyload" ).css('overflow', 'auto');
  $( ".loader" ).hide();
});
	
function goBack() {
  window.history.back();
}

	$(".video-modal").click(function(){
    var data_image = $(this).attr('data-iframe');
    var data_title = $(this).attr('data-title');
    var data_short_description = $(this).attr('data-short_description');
    

	$('body').css({'padding': '0px'});


		$('.video-body').html(data_image);
		$('.card-title').html(data_title);
		$('.short-description').html(data_short_description);
		
	});  

</script>

@include('sardar.widget.video-popup')
@endsection
@section('content')

<section class="Top_Details bg-white">
		<div class="container-fluid top-description">
			<div class="col-12 p-0 px-md-3">
				<div class="header-t mb-3">
					<h1 class="text-red">VIDEOS</h1>
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
				    <li class="breadcrumb-item active" aria-current="page">Videos</li>

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


				<div class="row justify-content-center">
						@foreach($videos as $video)

					<div class="col-md-6 col-lg-4 col-xl-4 p-2" >

						<div class="inflatables  m-0"
						
						>

						<a  class="video-modal"
						data-title="{{$video->title}}"
						data-short_description="{{$video->short_description}}"
						data-iframe="{{ html_entity_decode($video->youtube_embed) }}`"
						data-target="#exampleModal" data-toggle="modal" 
						href="#">
						<h3 class="InfaTitles video-title">{{$video->title}}</h3></a>
						<div class="video_thumbnail video_block">

						<a href="#">
							<p class="m-0">
								{!! html_entity_decode($video->youtube_embed) !!}	
							</p>
						</a>	
					</div>
					
						<div class="col-12 mb-0 d-flex justify-content-between">	
						<a href="#">
						<div class="video_clicks video-modal"
						data-title="{{$video->title}}"
						data-short_description="{{$video->short_description}}"
						data-iframe="{{ html_entity_decode($video->youtube_embed) }}`"
						data-target="#exampleModal" data-toggle="modal" 
						>DATE : {{$video->video_date}}
					
					

					</div>


					</a>

							<div class="video_clicks">Share Video</a><!-- ShareThis BEGIN -->
							<div class="sharethis-inline-share-buttons"></div><!-- ShareThis END --></div>
						</div>	
						</div>
					</div>
					@endforeach	
					</div>
					
			</div>	
		</div>	
	</section>

@endsection