@extends('sardar.layout.front-index')
@section('title','Videos')

@section('custom-js')

@endsection
@section('content')

<section class="Top_Details bg-white">
		<div class="container-fluid">
			<div class="col-12 p-0 px-md-3">
				<div class="header-t mb-3">
					<h1>VIDEOS</h1>
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
				    <li class="breadcrumb-item active" aria-current="page">videos</li>
				  </ol>
				</nav>
			</div>	
		</div>		
	</section>

	<section class="Blogs_Box media_world bg-white">
		<div class="container-fluid">
			<div class="col-12">


				<div class="row">
				@foreach($videos as $video)
					<div class="col-md-4 p-2">
						<div class="inflatables  m-0">
						<h3 class="InfaTitles">{{$video->title}}</h3>
						<div class="video_thumbnail m-auto">
					
						{!! html_entity_decode($video->youtube_embed) !!}		
					</div>
						<div class="col-12 mb-0 d-flex justify-content-between">	
							<div class="video_clicks">DATE : {{$video->video_date}}</div>
							<div class="video_clicks"><a href="#;">Share Video</a></div>
						</div>	
						</div>
					</div>
					@endforeach	
					</div>
					
			</div>	
		</div>	
	</section>

@endsection