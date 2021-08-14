@extends('sardar.layout.front-index')
@section('title','Testimonials')

@section('custom-js')

@endsection
@section('content')

<section class="Top_Details bg-white">
		<div class="container-fluid">
			<div class="col-12">
				<div class="header-t mb-3">
					<h1>TESTIMONIALS</h1>
				</div>	

				<div class="w-100 py-4 px-3 TopContent">
					<p class="mb-2">{{$pageData->description}}</p>
					</div>	
			</div>		
		</div>	
	</section>

	<section class="bg-white MyBreadcrumb pb-md-3">
		<div class="container-fluid">
			<div class="">
				<nav aria-label="breadcrumb" class="pl-2 pt-3">
				  <ol class="breadcrumb m-0 bg-white">
				    <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">testimonials</li>
				  </ol>
				</nav>
			</div>	
		</div>		
	</section>

	<section class="Blogs_Box media_world bg-white">
		<div class="container-fluid">
			<div class="col-12">

				<div class="notinflatables_slider mb-4">
					@foreach($testimonials as $testimonial)
						<div class="inflatables">
							<h3 class="InfaTitles">{{$testimonial->client_name}}</h3>
							<div class="img_thumbnail m-auto">
								<img src="{{url('web')}}/media/lg/{{$testimonial->image}}">
							</div>
							<div class="mediaWordFooter">
								<p>{{$testimonial->short_description}}</p>
							</div>	
							<div class="col-12 mb-4 text-right">	
								<a href="#;" class="red_btn">READ NOW</a>
							</div>	
						</div>

					@endforeach

				</div>	

			</div>	
		</div>	
	</section>


@endsection