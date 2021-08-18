@extends('sardar.layout.front-index')
@section('title','Blogs')

@section('custom-js')

@endsection
@section('content')



<section class="Top_Details bg-white">
		<div class="container-fluid">
			<div class="col-12">
				<div class="header-t mb-3">
					<h1>INFLATABLES BLOGS</h1>
				</div>	

				<div class="w-100 py-4 px-3 TopContent">
					<p class="mb-2">{!! html_entity_decode($pageData->description) !!}</p>					
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
				    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
				  </ol>
				</nav>
			</div>	
		</div>		
	</section>

	<section class="Blogs_Box media_world bg-white">
		<div class="container-fluid">
			<div class="col-12">


				<div class="notinflatables_slider row mb-0 ">
					@foreach($blogs as $blog)
						<div class="col-md-4 p-2">
						<div class="inflatables ">
							<h3 class="InfaTitles">{{$blog->title}}</h3>
							<div class="img_thumbnail m-auto">
								<img class="img-fluid" src="{{url('web')}}/media/sm/{{$blog->image}}">
							</div>
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