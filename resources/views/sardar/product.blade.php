@extends('sardar.layout.front-index')
@section('title','Product Page')

@section('custom-js')
<script>


$(window).scroll(function () {
    var menu_height = $(".top_header").height();
	var logo_g = $(".logo-g").height();
	var collection_slider = $(".collection-slider").height();

	if($("body").width() < 900)
	{
		if($(window).scrollTop() > 234) {
      $(".navbar-design").addClass('sticky');
      $(".logo-g").show();
      $(".top_header").hide();
      $("body").addClass('sticky-menu-body');
      $("body").css({
        'position': 'relative',
        'top': 280,
        'left': 0,
        });
		$(".breadcrumb-left").css({
        'position': 'fixed',
        'top': 38,
		'left': 0,
        });
    }
	else {
      $(".top_header").show();
      
      $(".navbar-design").removeClass('sticky');
      $("body").removeClass('sticky-menu-body');
      $("body").css({
        'position': 'relative',
        'top': 0,
        'left': 0,
        });
    }
    if($(window).scrollTop() > menu_height - logo_g + collection_slider) {
      $(".breadcrumb-left").css({
        'position': 'fixed',
        'top': 38,
        });
	}else{
		$(".collection-slider").show();
      $(".breadcrumb-left").css({
        'position': 'relative',
        'top': 0,
        });
	}

	}
	else{
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
    if($(window).scrollTop() > menu_height - logo_g) {
      $(".breadcrumb-left").css({
        'position': 'fixed',
        'top': logo_g + 54,
        });
	}
  
  else{
		$(".collection-slider").show();
      $(".breadcrumb-left").css({
        'position': 'relative',
        'top': 0,
        });
	}
	}
  });
  
  
function goBack() {
  window.history.back();
}


$(document).ready(function () {
  $( ".lazyload" ).css('overflow', 'auto');
  $( ".loader" ).hide();
});

//         $( document ).ready(function() {
//   $(".open-modal").click(function(){
//     //   alert('test');
//     var data_image = $(this).attr('data-image');
//     var data_type = $(this).attr('data-type');
//     var data_title = $(this).attr('data-title');
//     var data_clientName = $(this).attr('data-clientName');
//     var data_short_description = $(this).attr('data-short_description');
//     var data_full_description = $(this).attr('data-full_description');
    
// 		$('.card-img').attr('src',data_image);
// 		$('.card-image-link').val(data_image);
        
// 		$('.card-title').val(data_title);
// 		$('.card-client').html(data_clientName);
// 		$('.short-description').html(data_short_description);
// 		$('.full-description').html(data_full_description);


		
// 	}); 
// });

	$(".product").addClass( "active");
</script>
@include('sardar.widget.enquire-now2')
@endsection
@section('content')



	<section class="collection-slider bg-white">
		<div class="container-fluid top-description">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1 class="text-red">Giant Inflatable Products</h1>
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
                    
				    <li class="breadcrumb-item active" aria-current="page">Giant Inflatable Products</li>

				  </ol>
		<div>
			<a class="btn btn-dark btn-sm btn-rounded" onclick="goBack()"> ❮ Back</a>
		</div>
						</nav>
					</div>	
					
				</div>		
	</section>



	<section class="collection-slider bg-white">
		<div class="container-fluid">


        <div class="header-t">
					<h1><a class="text-red">TOP INFLATABLES</a></h1>
					<p>Home to a huge collection of in-stock and custom</p>
				</div>
                

        <!-- top inflatables from widget folder -->
        @include('sardar.widget.top-inflatables')


            </div>
            


		</div>		
</section>


@endsection