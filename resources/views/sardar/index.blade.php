@extends('sardar.layout.front-index')
@section('title','WELCOME TO CCPL WORLD An ISO 9001 : 2008 certified company')

@section('custom-js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
$('#myCarousel').on('slide.bs.carousel', function () {
  // do something…
})


</script>
@endsection
@section('content')
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
	  @foreach($sliders as $key => $slider)
		<li data-target="#carousel-example-2" data-slide-to="{{$key}}" class="@if($key==0) active @endif"></li>
	 @endforeach
  </ol>
  
  <div class="carousel-inner" role="listbox">
	  @foreach($sliders as $key => $slider)
    <div class="carousel-item @if($key==0) active @endif">
      <div class="view">
        <img class="d-block w-100" src="{{url('web')}}/media/lg/{{$slider->image}}"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Light mask</h3>
        <p>First text</p>
      </div>
    </div>
@endforeach

  </div>
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- <div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#video-carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#video-carousel-example" data-slide-to="1"></li>
    <li data-target="#video-carousel-example" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <video class="video-fluid" autoplay loop muted>
        <source src="https://mdbootstrap.com/img/video/Tropical.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source src="https://mdbootstrap.com/img/video/forest.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
		</video>
		<iframe style="width:100%; height:400" src="https://www.youtube.com/embed/kxQ8-bzHSAE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      
    </div>
  </div>
  <a class="carousel-control-prev" href="#video-carousel-example" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#video-carousel-example" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->



@if(isset($sliders->youtube_embed))
	{!! html_entity_decode($sliders->youtube_embed) !!}
@endif


	<section class="collection-slider bg-white">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t">
					<h1>TOP INFLATABLES</h1>
					<p>Home to a huge collection of in-stock and custom</p>
				</div>	
				
				<div class="inflatables_slider">

					@foreach($topInflatables as $topInflatable)
						
						<div class="inflatables">
							<div class="top-buttons infa_bg"><a href="{{url('product-detail')}}/{{$topInflatable->slug}}">{{$topInflatable->name}}</a></div>
							<div class="img_thumbnail m-auto">
								<img class="img-fluid" src="{{url('web')}}/media/md/{{$topInflatable->image}}">
							</div>
							<div class="bottom_links d-flex justify-content-between">
								<div class="bottom_links1">
									<a href="{{url('product-detail')}}/{{$topInflatable->slug}}"> <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png" class="img-fluid"> View All </a>
								</div>
								<div class="bottom_links1">
									<a href="{{url('contact-us')}}"> <img class="eye-icon" src="{{url('sardar')}}/images/email_icon.png" class="img-fluid"> Enquire Now </a>
								</div>
							</div>	
						</div>
					@endforeach


				</div>
			</div>	
		</div>	
	</section>

	<section class="clickANDexplore bg-white">
		<div class="container-fluid">
			<div class="col-12 p-0 px-lg-3">

				<div class="header-t mb-3">
					<h1>Click & Explore</h1>
				</div>	

				<div class="ParentclickExplore">


				@foreach($topCategories as $key => $topCategory)
					<div class="c_explores">
					
							@if($key == 0)
								<a href="{{$topCategory->url}}" class="btn clickExplore active">
							@else 							
								<a href="{{$topCategory->url}}" class="btn clickExplore">
							@endif
					
					<img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr">{{$topCategory->name}} </a></div>
				@endforeach

					<!-- @foreach($homeUrls1 as $key  => $homeUrl1 )

							<div class="c_explores col-md-2">
							@if($key == 0)
								<a href="{{$homeUrl1->url}}" class="btn clickExplore active">
							@else 							
								<a href="{{$homeUrl1->url}}" class="btn clickExplore">
							@endif

							<img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr"> {{$homeUrl1->title}} </a></div>
					@endforeach
				</div> -->


			</div>	
		</div>	
	</section>	

	<section class="about_giant pb-5">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1>About Giant Inflatable</h1>
				</div>	

				<div class="many_partition">
					<div class="about_part bg-white">
						<div class="ab_logo text-center">	
							<img src="{{url('sardar')}}/images/logo.png" class="img-fluid">
						</div>
						<div class="text-left">	
							<p><span class="GreaT"> Greetings ! </span></p>	
							{!! html_entity_decode($homeAbout->description, ENT_QUOTES, 'UTF-8') !!}
						</div>	
						<div class="col-12 text-center d-block mt-xl-3 pt-xl-3">	
							<a href="{{$homeAbout->url}}" class="red_btn d-inline-block">Read More</a>
						</div>	
					</div>	


					<div class="our_clients bg-white">	
						<h2>our clients</h2>
							@foreach($clients as $client)
								<div class="w-100 d-block">							
									<img src="{{url('web')}}/media/sm/{{$client->logo}}" class="img-fluid mb-4">
								</div>	
							@endforeach
					</div>	



					@include('sardar.widget.contact-form1')

					
				</div>	

			</div>	
		</div>	
	</section>

		


@endsection