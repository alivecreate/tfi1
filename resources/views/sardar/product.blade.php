@extends('sardar.layout.front-index')
@section('title','WELCOME TO CCPL WORLD An ISO 9001 : 2008 certified company')

@section('custom-js')

@endsection
@section('content')



	<section class="bg-white MyBreadcrumb">
		<div class="container-fluid">
			<div class="">
				<nav aria-label="breadcrumb" class="pl-2 pt-3">
				  <ol class="breadcrumb m-0 bg-white">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Giant Inflatable Products</li>
				  </ol>
				</nav>
			</div>	
		</div>		
	</section>

	<section class="collection-slider bg-white">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1>Giant Inflatable Products</h1>
				</div>	

				<div class="w-100 py-4 px-3 TopContent">
					<p class="mb-2">{!! html_entity_decode($pageData->description) !!}</p>					
				</div>	
				
				<div class="inflatables_slider mb-3">
				@foreach($products1 as $product1)
					<div class="inflatables">
						<div class="top-buttons infa_bg"><a href="{{url('product-detail')}}/{{$product1->slug}}">{{$product1->name}}</a>  </div>
						<div class="img_thumbnail m-auto">
							<img class="img-fluid" src="{{url('web')}}/media/lg/{{$product1->image}}">
						</div>

						<div class="bottom_links d-flex justify-content-between">
							<div class="bottom_links1">
								<a href="#"> <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png" class="img-fluid"> View All </a>
							</div>
							<div class="bottom_links1">
								<a href="{{url('contact-us')}}"> <img class="eye-icon" src="{{url('sardar')}}/images/email_icon.png" class="img-fluid"> Enquire Now </a>
							</div>
						</div>	
					</div>
				@endforeach
				</div>	
				
				<div class="inflatables_slider mb-3">
				@foreach($products2 as $product2)
					<div class="inflatables">
						<div class="top-buttons infa_bg"><a href="{{url('product-detail')}}/{{$product2->slug}}">{{$product2->name}}</a> </div>
						<div class="img_thumbnail m-auto">
							<img class="img-fluid" src="{{url('web')}}/media/lg/{{$product2->image}}">
													</div>
						<div class="bottom_links d-flex justify-content-between">
							<div class="bottom_links1">
								<a href="#"> <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png" class="img-fluid"> View All </a>
							</div>
							<div class="bottom_links1">
								<a href="#;"> <img class="eye-icon" src="{{url('sardar')}}/images/email_icon.png" class="img-fluid"> Enquire Now </a>
							</div>
						</div>	
					</div>
				@endforeach
				</div>	
				
				<div class="inflatables_slider mb-3">
				@foreach($products3 as $product3)
					<div class="inflatables">
						<div class="top-buttons infa_bg"><a href="{{url('product-detail')}}/{{$product3->slug}}">{{$product3->name}}</a></div>
						<div class="img_thumbnail m-auto">
							<img class="img-fluid" src="{{url('web')}}/media/lg/{{$product3->image}}">
													</div>
						<div class="bottom_links d-flex justify-content-between">
							<div class="bottom_links1">
								<a href="#"> <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png" class="img-fluid"> View All </a>
							</div>
							<div class="bottom_links1">
								<a href="#;"> <img class="eye-icon" src="{{url('sardar')}}/images/email_icon.png" class="img-fluid"> Enquire Now </a>
							</div>
						</div>	
					</div>
				@endforeach
				</div>	
				

			</div>	
		</div>	
	</section>



@endsection