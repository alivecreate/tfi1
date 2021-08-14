@extends('sardar.layout.front-contact')
@section('title','Contact Us')

@section('custom-js')

@endsection
@section('content')

<section class="Top_Details bg-white">
		<div class="container-fluid">
			<div class="col-12">
				<div class="header-t mb-3">
					<h1>CONTACT US</h1>
				</div>	

				<div class="w-100 py-4 px-3 TopContent">
					<p class="mb-2">{!! html_entity_decode($pageData->description) !!}</p>					
				</div>	
			</div>		
		</div>	
	</section>

@endsection