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
	var Top_Details = $(".Top_Details").height();

    if($(window).scrollTop() > 140) {
      $(".navbar-design").addClass('sticky');
      $(".logo-g").show();
    //   $(".top_header").hide();
      $("body").addClass('sticky-menu-body');
      $("body").css({
        'position': 'relative',
        'top': logo_g - 54,
        });
		// alert('333');
		console.log($(window).scrollTop());
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
		
      $(".breadcrumb-left").css({
        'position': 'fixed',
        'top': logo_g + 54,
        });
	}else{
      $(".breadcrumb-left").css({
        'position': 'relative',
        'top': 0,
        });
	}
  });
  
  
function goBack() {
  window.history.back();
}


</script>

@include('sardar.widget.enquire-now2')

@endsection
@section('content')
	<section class="collection-slider bg-white">
		<div class="container-fluid top-description">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1 class="text-red">Sitemap</h1>
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
                    
				    <li class="breadcrumb-item active" aria-current="page">Sitemap</li>

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

			<section>
			<div class="row p-3 sitemap">
				<div class="col-sm-3">
					<h4 class="active_color"><a href="{{url('')}}">Home</a></h4>
					<h4 class="active_color"><a href="{{url('about')}}">About Us</a></h4>
					<h4 class="active_color"><a href="{{url('contact-us')}}">Contact Us</a></h4>
					<h4 class="active_color"><a href="{{url('testimonials')}}">Testimonial</a></h4>
					<h4 class="active_color"><a href="{{url('videos')}}">Video</a></h4>
				</div>


				<div class="col-sm-4">
					<h4 class="active_color"><a href="{{url('products')}}">Products</a></h4>
						<ul>
							@foreach($mainCategories as $mainCategory)
								<li> <a href="{{url('')}}/{{$mainCategory->slug}}">{{$mainCategory->name}}</a></li>

								@if(count(getAllSubCategories($mainCategory->id)))
									<ul>
										@foreach(getAllSubCategories($mainCategory->id) as $subCategory)
											<li><a href="{{url('')}}/{{$subCategory->slug}}">{{$subCategory->name}}</a></li>
										@endforeach
									</ul>
								@endif
							@endforeach
						</ul>
				</div>

				<div class="col-sm-5">
					<h4 class="active_color"><a href="{{url('blog')}}">Blog</a></h4>
						<ul>
							@foreach($blogs as $blog)
								<li> <a href="{{url('blog')}}/{{$blog->slug}}">{{$blog->title}}</a></li>
							@endforeach
						</ul>
				</div>

				<div class="clearfix"></div>
			</div>
			</section>

		</div>	
	</section>

@endsection