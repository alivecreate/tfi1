@extends('sardar.layout.front-index')
@section('title','Product Details')

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

  

	$(".blog").addClass( "active");
</script>
@endsection
@section('content')


<section class="Top_Details bg-white">
		<div class="container-fluid">
			<div class="col-12">
				<div class="header-t mb-3">
					<h1>Blog </h1>
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


<!-- 
				<div class="row">
				@foreach($latestBlogs as $key => $latestBlog)
					<div class="c_explores col-md-2"><a href="#;" class="btn clickExplore active">
                    <img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr"> {{$latestBlog->title}} </a></div>
				@endforeach
				</div>	 -->
        
	<section class="collection-slider bg-white product-internal-slider">
		<div class="container-fluid mt-4">
			<div class="col-12 p-0 px-md-3">
				<div class="col-12">
					<div class="row">
						<div class="col-md-7 col-lg-9 px-4 set_max_80 blog-sidebar">
							<div class="">

              <h4 class="active" style="color: red;padding-bottom: 7px;padding-left: 5px;">{{$blogDetail->title}}</h4>
								<div class="FieldsTexts bg-white w-100 px-4 pt-4 ml-1">
                                
									<div class="text-left">	
										{!! html_entity_decode($blogDetail->full_description) !!}
									</div>
								</div>	
							</div>
						</div>	


						<div class="col-md-5 col-lg-3 px-4 pt-0 set_max_20 ">	
              @include('sardar.widget.contact-form1')
              <div class="mt-3">
                <h3>Latest Blog</h3>
                <ul class="d-block p-0 my-3">
                  @foreach($latestBlogs as $latestBlog)
                    <div class="blog_list">
                                            <img class="float-left p-2" width="120px" src="{{url('web')}}/media/sm/{{$latestBlog->image}}" />
                                            <a href="{{url('blog')}}/{{$latestBlog->slug}}">{{$latestBlog->title}}</a>
                                        </div>
                  @endforeach
                                </ul>
                </div>


              </div>
					</div>

				</div>			
			</div>	
		</div>	
	</section>



    <script src="{{url('sardar')}}/js/jquery-3.2.1.slim.min.js"></script>
    <script src="{{url('sardar')}}/js/popper.min.js"></script>
    <script src="{{url('sardar')}}/js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="{{url('sardar')}}/js/slick.min.js"></script>
  
  <script type="text/javascript">
  	$('.BigInnerinflatableSub_slider').slick({
      slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.BigInnerinflatableSub_Nav'
    });  

    $('.BigInnerinflatableSub_Nav').slick({
	  slidesToShow:9,
	  slidesToScroll:1,
	  asNavFor: '.BigInnerinflatableSub_slider',
	  dots: false,
	  centerMode: false,
	  focusOnSelect: true,
	  responsive: [
       
        {
          breakpoint:1200,
          settings: {
            slidesToShow:6
          }
        },
        {
          breakpoint:1000,
          settings: {
            slidesToShow:4
          }
        },
        {
          breakpoint:767,
          settings: {
            slidesToShow:4
          }
        },
        {
          breakpoint:400,
          settings: {
            slidesToShow:3
          }
        }
      ]
	});





    $('.ExploreNowslider').slick({
      arrows: true,
      infinite: true,
      speed:300,
      autoplay: true,
      slidesToShow:5,
      slidesToScroll:1,
      centerPadding: '20px',
      centerMode: false,
      responsive: [
       
        {
          breakpoint:1200,
          settings: {
            slidesToShow:3
          }
        },
        {
          breakpoint:1000,
          settings: {
            slidesToShow:2
          }
        },
        {
          breakpoint:767,
          settings: {
            arrows: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });  



  </script>
@endsection