@extends('sardar.layout.front-index')
@section('title','Product Details')


	@section('custom-head')

	<style>
		.magnify-modal {
			box-shadow: 0 0 6px 2px rgba(0, 0, 0, .3);
			}

			.magnify-header .magnify-toolbar {
			background-color: rgba(0, 0, 0, .5);
			}
			.magnify-stage {
			border-width: 0;

			text-align:center;
			}

			.magnify-footer {
			bottom: 10px;
			}

			.magnify-footer .magnify-toolbar {
			background-color: rgba(0, 0, 0, .5);
			border-radius: 5px;
			}

			.magnify-loader {
			background-color: transparent;
			}

			.magnify-header,
			.magnify-footer {
			pointer-events: none;
			}

			.magnify-button {
			pointer-events: auto;
			}

		.Biginflatables .img_thumbnail img {
			border-radius: 5px;
			width: 100%;
			height: auto;
			object-fit: contain;
			background: black;
		}
		.my_slider_block{
			margin:0 auto;
		}
		.my_slider_block .Biginflatables .slick-slide {
			height: 400px;
		}

		.my_slider_block .Biginflatables .img_thumbnail img{
			object-fit: contain;
			height: 400px;
			background: black;
		}
			.slick-prev.slick-arrow {
				left: 3% !important;
				z-index: 0 !important;
			}

			.slick-next.slick-arrow {
				right: 3% !important;
				z-index: 0 !important;
			}
	</style>

	@endsection

@section('custom-js')

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


</script>

@include('sardar.widget.enquire-now2')
@endsection
@section('content')

<?php 
// dd($mainCategory);

$subCategory = $current_cat;
// dd($subCategory);



// $current_products = DB::table('products')->where(['category_id' => $subCategory->id, 'status' => 1])->get();


	$finalSlug = '';
	$mainCategorySlug = '';
	$subCategorySlug = '';
	$subCategory2Slug = '';

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
			
				<div class="row text-center" style="justify-content: center;">
                        @foreach(getMainCategories(0, 16) as $key => $mainCategoryAll)
                            <div  class="top-list-title">
                            <a href="{{url('')}}/{{$mainCategoryAll->slug}}"  class="btn top-buttons infa_bg title_bg_sm
                               
									@if($mainCategory->id == $mainCategoryAll->id)
										activeTitle
									@endif
                             ">
										
							<img style="max-width: 18px;margin-right: 10px;"
                            src="{{ url('sardar') }}/img/active-link-icon.png">
                                         {{$mainCategoryAll->name}} </a>
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
						
						<div class="col-md-7 col-lg-9 pr-md-0 set_max_80 my_slider_block" style="overflow: hidden;">



				<div class="header-t mb-3">
					<h1 class="text-red">{{$subCategory->name}}</h1>
				</div>	
				
						<div class="">
								<div class="BigInnerinflatableSub_slider mb-3 image-set">
								@foreach($productImages as $productImage)
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" data-magnify="gallery" 
											data-src="{{url('web')}}/media/lg/{{$productImage->image}}"  
											src="{{url('web')}}/media/lg/{{$productImage->image}}"
											style="background: none;"
											>
										</div>
									</div>
								@endforeach
								</div>	

								<div class="col-md-12 mb-4">	
									<div class="BigInnerinflatableSub_Nav mb-3">
										@foreach($productImages as $productImage)
										<div class="thumb_big_slider my_slider_thumb" style="">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('web')}}/media/lg/{{$productImage->image}}">
											</div>
										</div>
										@endforeach
									</div>
								</div>	
							</div>




					@if($productDetail->description)
						<div class="FieldsTexts bg-white mb-4 p-2 ml-1 product-detail-block">

							<div class="text-left">	

								<p class="mb-0 my-3"><span class="GreaT"> {{$productDetail->short_description}} </span>
								{!! html_entity_decode($productDetail->description) !!}</p>	
							</div>
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

	<script type="text/javascript" src="{{url('sardar')}}/js/slick.min.js"></script>	
	<script src="{{url('magnify')}}/dist/jquery.magnify.js"></script>
  
  
  <!-- <script src="{{url('magnify')}}/dist/jquery.magnify.js"></script> -->

  <script>
    $('[data-magnify]').magnify({
      resizable: true,
      initMaximized: true,
      headerToolbar: [
        'close'
      ],
    });

  </script>

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


$(document).on('ready', function () {


	$('[data-magnify]').magnify({
  resizable: false,
  headerToolbar: [
    'close'
  ],
  initMaximized: true
})


    // INITIALIZATION OF SLICK CAROUSEL
    // =======================================================
    $('.js-slick-carousel').each(function() {
      var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
    });
  });

  	$('.BigInnerinflatableSub_slider').slick({
      slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: true,
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
          breakpoint:2600,
          settings: {
            slidesToShow:12
          }
        },
        {
          breakpoint:1800,
          settings: {
            slidesToShow:8
          }
        },
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