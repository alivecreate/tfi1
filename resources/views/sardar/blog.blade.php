@extends('sardar.layout.front-index')
@section('title','Blogs')

@section('custom-js')

<script>

$(document).ready(function () {
  $( ".lazyload" ).css('overflow', 'auto');
  $( ".loader" ).hide();
});
function goBack() {
  window.history.back();
}


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
  
  
	$(".blog").addClass( "active");
</script>
@endsection
@section('content')



<section class="Top_Details bg-white">
		<div class="container-fluid top-description">
			<div class="col-12">
				<div class="header-t mb-3">
					<h1 class="text-red">INFLATABLES BLOGS</h1>
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
					
				    <li class="breadcrumb-item active" aria-current="page">Blogs</li>

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


				<div class="notinflatables_slider my_blog row mb-0 ">
					@foreach($blogs as $blog)
						<div class="col-lg-4 col-sm-6 p-2">
							<div class="inflatables">
								<h3 class="InfaTitles mb-0">
								<a href="{{url('blog')}}/{{$blog->slug}}">{{addEllipsis($blog->title, 60, '...')}}</a></h3>
								<a href="{{url('blog')}}/{{$blog->slug}}">
									<div class="img_thumbnail blog_block m-auto"
										style="background-size: 58px;"
									>
										<img class="img-fluid p-0" 
										style="object-fit: cover;border-radius: 13px;"
										src="{{url('web')}}/media/md/{{$blog->image}}">

									</div>
								</a>

								<div class="mediaWordFooter">
									<p>{{$blog->short_description}}</p>
								</div>	
								<div class="col-12 mb-4 text-right">	
									<a href="{{url('blog')}}/{{$blog->slug}}" class="red_btn">READ NOW</a>
								</div>	
							</div>
						</div>
					@endforeach

				</div>	
			</div>	
		</div>	
	</section>

@endsection