@extends('sardar.layout.front-index')
@section('title','Product Details')

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
						<div class="col-md-5 col-lg-3 pl-md-0 set_max_20">	
						
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

				<div class="BigInnerinflatableSub_slider mb-3">

								@foreach($productImages as $productImage)
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<a data-magnify="gallery"
											 data-caption="{{$productImage->image}}"
												href="{{url('web')}}/media/lg/{{$productImage->image}}">
												<img class="img-fluid" src="{{url('web')}}/media/lg/{{$productImage->image}}">
											</a>
										</div>
									</div>
								@endforeach 
								</div>	

								<div class="col-md-12 mb-4 ">	
									<div class="BigInnerinflatableSub_Nav mb-3">

									@foreach($productImages as $productImage)
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<a data-magnify="gallery" data-caption="{{$productImage->image}}"
													href="{{url('web')}}/media/lg/{{$productImage->image}}">
													<img class="img-fluid" src="{{url('web')}}/media/lg/{{$productImage->image}}">
												</a>
											</div>
										</div>
									@endforeach
									</div>
								</div>

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

								<div class="FieldsTexts bg-white p-2 ml-1 product-detail-block">
									<div class="text-left">	

										<p><span class="GreaT"> {{$productDetail->short_description}} </span></p>	
										{!! html_entity_decode($productDetail->full_description) !!}
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
  <script src="{{url('magnify')}}/dist/jquery.magnify.js"></script>
  
  <script type="text/javascript" src="{{url('sardar')}}/js/slick.min.js"></script>
  
  <script src="{{url('magnify')}}/dist/jquery.magnify.js"></script>

<script>
  $('[data-magnify]').magnify({
	resizable: false,
	initMaximized: true,
	headerToolbar: [
	  'close'
	],
  });

</script>
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