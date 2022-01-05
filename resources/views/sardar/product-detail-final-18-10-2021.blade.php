@extends('sardar.layout.front-index')
@section('title','Product Details')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-zoom.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/css/justifiedGallery.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-thumbnail.css">
	  
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lightgallery-bundle.css">

	  
	<link rel="stylesheet" type="text/css" href="{{url('wow-slider')}}/engine1/style.css" />

@section('custom-js')

<!-- <script type="text/javascript" src="{{url('wow-slider')}}/engine1/jquery.js"></script> -->

<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/thumbnail/lg-thumbnail.umd.js"></script>
      
	  <script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/lightgallery.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/autoplay/lg-autoplay.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/comment/lg-comment.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/fullscreen/lg-fullscreen.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/hash/lg-hash.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/pager/lg-pager.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/rotate/lg-rotate.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/share/lg-share.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/thumbnail/lg-thumbnail.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/video/lg-video.umd.js"></script>
				<script src="https://www.cssscript.com/demo/responsive-lightbox-gallery-pure-javascript-css3-lightgallery/plugins/zoom/lg-zoom.umd.js"></script>


<script>
   jQuery("#animated-thumbnails-gallery").
   justifiedGallery({
	 captions: false,
	 lastRow: "justify",
	 rowHeight: 180,
	 margins: 5 }).
   
   on("jg.complete", function () {
	 window.lightGallery(
	 document.getElementById("animated-thumbnails-gallery"),
	 {
	   autoplayFirstVideo: true,
	   pager: true,
	   galleryId: "nature",
	   plugins: [lgAutoplay, lgComment, lgFullscreen,  lgPager, lgShare, lgVideo, lgZoom, lgThumbnail],


	   mobileSettings: {
		 controls: true,
		 showCloseIcon: true,
		 download: true,
		 rotate: true } });
   
   
   
   });
   //# sourceURL=pen.js
	   
</script>

<script>
$(document).ready(function () {
  $( ".lazyload" ).css('overflow', 'auto');
  $( ".loader" ).hide();
});
$(window).scroll(function () {
    
    var menu_height = $("#head").height();
    // alert(menu_height);

    if($(window).scrollTop() > 10) {
      $("#head").addClass('sticky');
      $("body").addClass('sticky-menu-body');
      $("body").css({
        'position': 'relative',
        'top': menu_height,
        });
      
    } else {
      $("#head").removeClass('sticky');
      $("body").removeClass('sticky-menu-body');

      $("body").css({
        'position': 'relative',
        'top': 0,
        });
    }
  });
  
	$(".product").addClass( "active");
	
function goBack() {
  window.history.back();
}


$('[data-magnify]').magnify({
  resizable: false,
  headerToolbar: [
    'close'
  ],
  initMaximized: true
})

</script>

@include('sardar.widget.enquire-now2')
@endsection
@section('content')

<?php 

$main_category_data = getParentCategory($subCategory->id)['category'];

$current_products = DB::table('products')->where(['category_id' => $subCategory->id, 'status' => 1])->get();


	$finalSlug = '';
	$mainCategorySlug = '';
	$subCategorySlug = '';
	$subCategory2Slug = '';

	$main_category_data = getParentCategory($subCategory->id)['category'];

	$current_products = DB::table('products')->where(['category_id' => $subCategory->id, 'status' => 1])->get();

	// dd($current_products);


?>
	@if(isset(getParentCategory($subCategory->id)['category']))
	<?php $finalSlug = getParentCategory($subCategory->id)['category']->slug.'/';
		$mainCategorySlug = $finalSlug;
	?>
	@endif

		@if(isset(getParentCategory($subCategory->id)['subcategory']))
			<?php $finalSlug = $finalSlug.getParentCategory($subCategory->id)['subcategory']->slug.'/' ;
				$subCategorySlug = $finalSlug;
				// dd($subCategorySlug);

			?>
		@endif

		@if(isset(getParentCategory($subCategory->id)['subcategory2']))
			<?php $finalSlug = $finalSlug.getParentCategory($subCategory->id)['subcategory2']->slug.'/';
				$subCategory2Slug = $finalSlug;
				// dd($subCategory2Slug);
			?>
		@endif
		
<?php

	if($type == 'maincategory_product'){
		// dd($type);

		$finalSlug = $finalSlug;
	}
	elseif($type == 'maincategory_sub_sub2_product'){
		// dd($type);
		$finalSlug = $subCategorySlug;
	}
	elseif($type == 'maincategory_subcategory_product'){
		// dd($type);

		$finalSlug = $mainCategorySlug;
	}
	
	if(isset(getParentCategory($subCategory->id)['category']))
	{
		$searchCriteria = getParentCategory($subCategory->id)['category']->id;
	}
	if(isset(getParentCategory($subCategory->id)['subcategory']))
	{
		$searchCriteria = $searchCriteria.','.getParentCategory($subCategory->id)['subcategory']->id;
	}
	if(isset(getParentCategory($subCategory->id)['subcategory2']))
	{
		$searchCriteria = $searchCriteria.','.getParentCategory($subCategory->id)['subcategory2']->id;
	}

$arr = explode(',',$searchCriteria);
// dd($arr);

$intArray = array_map(
    function($value) { return (int)$value; },
    $arr
);

$current_criteria = DB::table('criteria_metas')->whereIn('categories', $intArray)->get();

// dd($current_criteria);

	?>

<section class="clickANDexplore bg-white pb-0">
		<div class="container-fluid">
			<div class="col-12 p-0 px-lg-3">

				<div class="header-t mb-3">
					<h1>TOP INFLATABALES</h1>
				</div>	
			

				<div class="ParentclickExplore">
                        @foreach(getMainCategories(0, 5) as $key => $mainCategory)
                            <div class="c_explores">
                            <a href="{{url('')}}/{{$mainCategory->slug}}" class="btn clickExplore
                               
									@if($main_category_data->id == $mainCategory->id)
										activeTitle
									@endif
                             ">
										
							<img style="max-width: 18px;margin-right: 10px;"
                            src="{{ url('sardar') }}/img/active-link-icon.png">
                                         {{$mainCategory->name}} </a>
                            </div>
                        @endforeach
                </div>

			
				<div class="ParentclickExplore">
                        @foreach(getMainCategories(5, 5) as $key => $mainCategory)
                            <div class="c_explores">
                            <a href="{{url('')}}/{{$mainCategory->slug}}" class="btn clickExplore
                               
									@if($main_category_data->id == $mainCategory->id)
										activeTitle
									@endif
                             ">
										
							<img style="max-width: 18px;margin-right: 10px;"
                            src="{{ url('sardar') }}/img/active-link-icon.png">
                                         {{$mainCategory->name}} </a>
                            </div>
                        @endforeach
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
					
					@if(getReffrel() && getReffrel()['name'] != getParentCategory($subCategory->id)['category']->name)
				    	<li class="breadcrumb-item"><a href="{{getReffrel()['url']}}">{{getReffrel()['name']}}</a></li>
					@endif
					
					
					@if(getParentCategory($subCategory->id)['category'])
						<li class="breadcrumb-item"><a href="{{url('')}}/{{getParentCategory($subCategory->id)['category']->slug}}">{{getParentCategory($subCategory->id)['category']->name}}</a></li>
                        @endif

						@if(getParentCategory($subCategory->id)['subcategory'])
						<li class="breadcrumb-item"><a href="{{url('')}}/{{$subCategorySlug}}">{{getParentCategory($subCategory->id)['subcategory']->name}}</a></li>
                        @endif

						@if(getParentCategory($subCategory->id)['subcategory2'])
						<li class="breadcrumb-item"><a href="{{url('')}}/{{$subCategory2Slug}}">{{getParentCategory($subCategory->id)['subcategory2']->name}}</a></li>
                        @endif

				  </ol>
		<div>
			<a class="btn btn-dark btn-sm btn-rounded" onclick="goBack()"> ❮ Back</a>
		</div>
						</nav>
					</div>	
					
				</div>		
	</section>


	<section class="collection-slider bg-white product-internal-slider">
		<div class="container-fluid">
			<div class="col-12 p-0 px-md-3">


				<div class="col-12">
					<div class="row">
						<div class="col-md-5 col-lg-3 pl-md-0 set_max_20 my_left_side">	
						
						<div class="sub_categories sub_categories_padding2">

								@if($current_sub_categories->count() > 0)
									<h2>SUB CATEGORIES</h2>

									<ul class="d-block p-0 my-3">
										@foreach($current_sub_categories as $current_sub_category)

										<li>
											<a 
											class="@if($subCategory->slug == $current_sub_category->slug) text-red @endif"
										href="{{url('')}}/{{getParentCategory($current_sub_category->parent_id)['category']->slug}}/{{$current_sub_category->slug}}">
										<i class="fa fa-chevron-right @if($subCategory->slug == $current_sub_category->slug) text-red @endif"></i>{{$current_sub_category->name}}</a></li>
											
										@endforeach
									</ul>
								@endif
									<h3 class="backTo"><a href="{{url('')}}/{{getParentCategory($current_sub_category->parent_id)['category']->slug}}"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i> &nbsp; Back to Main Categories</a></h3>	
								
							</div>

						@include('sardar.widget.contact-form1')

						</div>
						
						<div class="col-md-7 col-lg-9 pr-md-0 set_max_80" style="overflow: hidden;">



				<div class="header-t mb-3">
					<h1 class="text-red">{{$subCategory->name}}</h1>
				</div>	
				
	
      <!-- Start WOWSlider.com BODY section -->
<!-- End WOWSlider.com BODY section -->

<!-- 
								<div class="col-md-12 mb-4 ">	
									<div class="BigInnerinflatableSub_Nav mb-3"   id="animated-thumbnails-gallery">

									@foreach($productImages as $productImage)
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
										<a data-lg-size="1600-1067" class="gallery-item jg-entry jg-entry-visible" 
											data-src="{{url('web')}}/media/lg/{{$productImage->image}}" data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@tobbes_rd' >Tobias Rademacher </a></h4><p> Location - <a href='https://unsplash.com/s/photos/puezgruppe%2C-wolkenstein-in-gr%C3%B6den%2C-s%C3%BCdtirol%2C-italien'>Puezgruppe, Wolkenstein in Gröden, Südtirol, Italien</a>layers of blue.</p>" style="width: 506px; height: 337.333px; top: 5px; left: 5px;" data-lg-id="4a1b06c6-b7f9-42a1-b279-3578dfdcf13a">
											
													<img class="img-fluid" src="{{url('web')}}/media/lg/{{$productImage->image}}">
											</a>
											</div>
										</div>
									@endforeach
									</div>
								</div> -->

							<!-- <div class="">
								<div class="BigInnerinflatableSub_slider mb-3 image-set big_slide_block">

									@foreach($productImages as $productImage)
									<a data-magnify="gallery" data-caption="{{$productImage->image}}"
									href="{{url('web')}}/media/lg/{{$productImage->image}}">
	  
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto p-2">
										
									<img  class="img-fluid" src="{{url('web')}}/media/lg/{{$productImage->image}}" alt="">
								

										</div>
										</div>
										</a>
									@endforeach
							</div>	 -->
<!-- 
								<div class="col-md-12 mb-4">	
									<div class="BigInnerinflatableSub_Nav mb-3 image-set image-link">

									@foreach($productImages as $productImage)
									<a data-magnify="gallery"  data-caption="{{$productImage->image}}"
									href="{{url('web')}}/media/lg/{{$productImage->image}}">
	  
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('web')}}/media/sm/{{$productImage->image}}">
											</div>
										</div>
										</a>
									@endforeach

									</div>
								</div>	
 -->
 <div class="FieldsTexts bg-white mt-3 mb-4 p-2 ml-1 product-detail-block">

@include('sardar.widget.wow-slider')

</div>
<br>
								@if($productDetail->short_description || $productDetail->full_description)
								<div class="FieldsTexts bg-white mt-3 p-2 ml-1 product-detail-block">

									<div class="text-left">	

										<p><span class="GreaT"> {{$productDetail->short_description}} </span></p>	
										{!! html_entity_decode($productDetail->full_description) !!}
									</div>
								@endif
								
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
  <script src="{{url('magnify')}}/dist/jquery.magnify.js"></script>
  
  <script type="text/javascript" src="{{url('sardar')}}/js/slick.min.js"></script>
  
  <script src="{{url('magnify')}}/dist/jquery.magnify.js"></script>

  <style>
.instuction {
	font-family: sans-serif, Arial;
	display: block;
	margin: 0 auto;
	max-width: 820px;
	width: 100%;
	padding: 0 70px;
	color: #222;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.instuction h1 img {
	max-width: 170px;
	vertical-align: middle;
	margin-bottom: 10px;
}
.instuction h1 {
	color: #2F98B3;
	text-align: center;
}
.instuction h2 {
	position: relative;
	font-size: 1.1em;
	color: #2F98B3;
	margin-bottom: 20px;
	margin-top: 40px;
}
.instuction h2 span.num {
	position: absolute;
	left: -70px;
	top: -18px;
	display: inline-block;
	vertical-align: middle;
	font-style: italic;
	font-size: 1.1em;
	width: 60px;
	height: 60px;
	line-height: 60px;
	text-align: center;
	background: #2F98B3;
	color: #fff;
	border-radius: 50%;
}
.instuction .mono {
	color: #000;
	font-family: monospace;
	font-size: 1.3em;
	font-weight: normal;
}
.instuction li.mono {
	font-size: 1.5em;
}

.instuction ul {
	font-size: 0.9em;
	margin-top: 0;
	padding-left: 0;
	list-style: none;
}
.instuction .note {
	color: #A3A3B2;
	font-style: italic;
	padding-top: 10px;
}
.instuction p.note {
	text-align: center;
	padding-top: 0;
	margin-top: 4px;
}
.instuction textarea {
	font-size: 0.9em;
	min-height: 60px;
	padding: 10px;
	margin: 0;
	overflow: auto;
	max-width: 100%;
	width: 100%;
}
.instuction a,
.instuction a:visited {
	color: #2F98B3;
}
</style>

	  
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