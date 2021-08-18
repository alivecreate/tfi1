@extends('sardar.layout.front-index')
@section('title','Product Details')

@section('custom-js')

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
						<div class="col-md-5 col-lg-3 pl-md-0 set_max_20">	

							<div class="">
								<h2>Latest Blog</h2>
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
						<div class="col-md-7 col-lg-9 pr-md-0 set_max_80">
							<div class="">

								<div class="FieldsTexts bg-white w-100 p-2 ml-1">
                                
									    <h3>{{$blogDetail->title}}</h3>
									<div class="text-left">	
									    {{$blogDetail->short_description}}
										{!! html_entity_decode($blogDetail->full_description) !!}
									</div>
								</div>	
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