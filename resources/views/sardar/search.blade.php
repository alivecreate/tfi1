@extends('sardar.layout.front-index')
@section('title','Product Page')

@section('custom-js')
<script>
	$(".product").addClass( "active");

    $(window).scroll(function () {
    if($(window).scrollTop() > 10) {
      $("#head").addClass('sticky');
    } else {
      $("#head").removeClass('sticky');
    }
  });
  
$(document).ready(function () {
  $( ".lazyload" ).css('overflow', 'auto');
  $( ".loader" ).hide();
});

function goBack() {
  window.history.back();
}
</script>
@include('sardar.widget.enquire-now2')
@endsection
@section('content')

<?php 
    $catArrs = explode(',', $criteriaMetaData->categories);

    // dd($catArrs);
    
    // if(isset($catArrs)){
    //     dd('found');
    // }else{
    //     dd('not found');
    // }


?>

<section class="clickANDexplore bg-white">
        <div class="container-fluid">
            <div class="col-12 p-0 px-lg-3">

                <div class="header-t mb-3">
                    <h1>Search by Industry:</h1>
                </div>

                <div class="row">
                    <div class="ParentclickExplore">
                        @foreach($criteriaMetas as $key => $criteriaMeta)
                            <div class="c_explores">
                            <a href="{{url('products')}}?inflatable={{$criteriaMeta->slug}}" class="btn clickExplore
                                @if($criteriaData->id == $criteriaMeta->criteria_id)
                                    activeTitle
                                @endif
                             "><img class="noHvr"
                                        src="{{ url('sardar') }}/img/active-link-icon.png"><img
                                        src="{{ url('sardar') }}/img/active-link-icon.png" class="InHvr">
                                         {{$criteriaMeta->name}} </a>
                            </div>
                        @endforeach
                        
                 
                </div>
    </section>


	<section class="bg-white MyBreadcrumb">
		<div class="row m-0 px-2">

        <div class="col-sm-6">
				<nav aria-label="breadcrumb" class="pl-2 pt-3">
				  <ol class="breadcrumb m-0 bg-white">
				    <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
					@if(getReffrel())
				    	<li class="breadcrumb-item"><a href="{{getReffrel()['url']}}">{{getReffrel()['name']}}</a></li>
					@endif
                    
				    <li class="breadcrumb-item active" aria-current="page">Giant Inflatable Products</li>
				  </ol>

				</nav>
			</div>	

    		<div class="col-sm-6">
				<nav aria-label="breadcrumb" class="pl-2 pt-3">
				  <ol class="breadcrumb mr-5 bg-white pull-right pt-0">
				    <li class=""><a class="btn btn-dark" onclick="goBack()"> ❮ Back</a></li>
				</ol>

				</nav>
			</div>	
            
		</div>	

	</section>

	<section class="collection-slider bg-white">
		<div class="container-fluid">
			<div class="col-12">
				
				<div class="notinflatables_slider row mb-3">
				@foreach($catArrs as $catArr)
                    <?php
                        $catData = getCategoryData($catArr);
                    ?>
                    @if(isset($catData))

                        <div class="inflatables col-sm-4"><a href="{{url('')}}/{{getProductUrl($catArr)}}">
                            <div class="top-buttons infa_bg">{{$catData->name}}</div></a>  
                            <div class="img_thumbnail m-auto">
                                <a href="{{url('')}}/{{$catData->slug}}"> 
                                    <img class="img-fluid" src="{{url('web')}}/media/lg/{{$catData->image}}">
                                </a>
                            </div>

                            <div class="bottom_links d-flex justify-content-between">
                                <div class="bottom_links1">
                                    <a href="{{url('')}}/{{$catData->slug}}"> 

                                    <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                    <!-- <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png" class="img-fluid">  -->
                                    View All </a>
                                </div>
                                <div class="bottom_links1">
                                    
                                <a class="open-modal" id="{{$catData->id}}"
                                    data-title="{{$catData->name}}" 
                                    data-image="{{url('web')}}/media/md/{{$catData->image}}" 
                                    data-page-url="{{url('')}}/{{$catData->slug}}" 
                                    data-product-url="{{url('')}}/{{$catData->slug}}" 
                                    
                                            data-target="#exampleModal"
                                            data-toggle="modal" 
                                            
                                    > 

                                    <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                    <!-- <img class="eye-icon" src="{{url('sardar')}}/images/email_icon.png" class="img-fluid">  -->
                                    
                                    Enquire Now </a>
                                </div>
                            </div>	
                        </div>
                    @else
                    <script>window.location = "{{ url('products') }}";</script>
                    @endif
                    @endforeach

                
				</div>	
				

			</div>	
		</div>	
	</section>



@endsection