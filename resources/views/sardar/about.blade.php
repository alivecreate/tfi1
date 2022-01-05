@extends('sardar.layout.front-index')
@section('title','About Us')

@section('custom-js')
<script>
	

	$(document).ready(function () {
  $( ".lazyload" ).css('overflow', 'auto');
  $( ".loader" ).hide();
});


$(window).scroll(function () {
    var menu_height = $(".top_header").height();
	var logo_g = $(".logo-g").height();
	var collection_slider = $(".collection-slider").height();

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
    if($(window).scrollTop() > menu_height - logo_g ) {
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


	$(".about").addClass( "active");
</script>

@include('sardar.widget.enquire-now2')

@endsection
@section('content')
	<section class="collection-slider bg-white">
		<div class="container-fluid top-description">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1 class="text-red">About Us</h1>
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
                    
				    <li class="breadcrumb-item active" aria-current="page">About Us</li>

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
			<div class="col-12">


			<div class="header-t">
					<h1><a>TOP INFLATABLES</a></h1>
					<p>Home to a huge collection of in-stock and custom</p>
				</div>
                
        <!-- top inflatables from widget folder -->
        @include('sardar.widget.top-inflatables')



			</div>	
		</div>	
	</section>

@endsection