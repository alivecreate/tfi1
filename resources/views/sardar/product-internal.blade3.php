

@extends('sardar.layout.front-index')
@section('title',' Internal')

@section('custom-js')
<script>
	$(".product").addClass( "active");

function goBack() {
  window.history.back();
}


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
  
$( document ).ready(function() {
});

</script>
<style>
.sub_categories_padding {
    margin-top: 130px;
}
</style>
@include('sardar.widget.enquire-now2')
@endsection
@section('content')

@if(isset(getParentCategory($current_cat->id)['category']))
	<?php $finalSlug = getParentCategory($current_cat->id)['category']->slug.'/';
		$mainCategorySlug = $finalSlug;
		$searchCriteria = getParentCategory($current_cat->id)['category']->id;
	?>
	@endif

		@if(isset(getParentCategory($current_cat->id)['subcategory']))
			<?php $finalSlug = $finalSlug.getParentCategory($current_cat->id)['subcategory']->slug.'/' ;
				$subCategorySlug = $finalSlug;
				$searchCriteria = $searchCriteria.','.getParentCategory($current_cat->id)['subcategory']->id;
			?>
		@endif

		@if(isset(getParentCategory($current_cat->id)['subcategory2']))
			<?php $finalSlug = $finalSlug.getParentCategory($current_cat->id)['subcategory2']->slug.'/';
				$subCategory2Slug = $finalSlug;
				$searchCriteria = $searchCriteria.','.getParentCategory($current_cat->id)['subcategory2']->id;
			?>
		@endif

		
<?php 
	$main_category_data = getParentCategory($current_cat->id)['category'];
	$current_products = DB::table('products')->where(['category_id' => $current_cat->id, 'status' => 1])->get();
	
// dd($main_category_data);
$arr = explode(',',$searchCriteria);
// dd($arr);

$intArray = array_map(
    function($value) { return (int)$value; },
    $arr
);
// dd($intArray);

$intArray = array_map(
    function($value) { return (int)$value; },
    $arr
);

$current_criteria = DB::table('criteria_metas')->whereIn('categories', $intArray)->get();


// $current_criteria = DB::table('criteria_metas')->where('status', 1)
// ->whereRaw('FIND_IN_SET("242",categories)')

// ->whereIn('categories', $intArray)->get();

// $taskAssigns = TaskAssign::whereRaw('FIND_IN_SET("'.session('LoggedUser')->id.'",admin_group)')->orderBy('id', 'DESC')->get();

// dd($current_criteria);

?>

<?php 
	$finalSlug = '';
	$mainCategorySlug = '';
	$subCategorySlug = '';
	$subCategory2Slug = '';
?>
		
<!-- 
	<section class="clickANDexplore bg-white pb-0">
		<div class="container-fluid">
			<div class="col-12 p-0 px-lg-3">

				<div class="header-t mb-3">
					<h1>TOP INFLATABALES</h1>
				</div>	


				<div class="ParentclickExplore">
                        @foreach($criteriaMetas as $key => $criteriaMeta)
                        
                            <div class="c_explores">
                            <a href="{{url('products')}}?inflatable={{$criteriaMeta->slug}}" class="btn clickExplore
                               

								@foreach($current_criteria as $current_criteria1)
									@if($current_criteria1->id == $criteriaMeta->id)
										activeTitle
									@endif
                        		@endforeach
								
                             ">
										
										<img style="max-width: 18px;margin-right: 10px;height: 22px;"
                            src="{{ url('sardar') }}/img/active-link-icon.png">
                                         {{$criteriaMeta->name}} </a>
                            </div>


                        @endforeach

                </div>

			
		
		
			</div>	
		</div>	
	</section> -->



	<section class="clickANDexplore bg-white pb-0">
		<div class="container-fluid">
			<div class="col-12 p-0 px-lg-3">

				<div class="header-t mb-3">
					<h1>TOP INFLATABALES</h1>
				</div>	


				<div class="ParentclickExplore">
                        @foreach(getMainCategories(0, 5) as $key => $mainCategory)
                            <div class="c_explores ">
                            <a href="{{url('')}}/{{$mainCategory->slug}}" class="btn top-buttons infa_bg
                               
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
                            <div class="c_explores ">
                            <a href="{{url('')}}/{{$mainCategory->slug}}" class="btn top-buttons infa_bg
                               
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
					@if(getReffrel())
				    	<li class="breadcrumb-item"><a href="{{getReffrel()['url']}}">{{getReffrel()['name']}}</a></li>
					@endif
					
					@if(getParentCategory($current_cat->id)['category'])
						<li class="breadcrumb-item"><a href="{{url('')}}/{{getParentCategory($current_cat->id)['category']->slug}}">{{getParentCategory($current_cat->id)['category']->name}}</a></li>
                        @endif

						@if(getParentCategory($current_cat->id)['subcategory'])
						<li class="breadcrumb-item"><a href="{{url('')}}/{{$subCategorySlug}}">{{getParentCategory($current_cat->id)['subcategory']->name}}</a></li>
                        @endif

						@if(getParentCategory($current_cat->id)['subcategory2'])
						<li class="breadcrumb-item"><a href="{{url('')}}/{{$subCategory2Slug}}">{{getParentCategory($current_cat->id)['subcategory2']->name}}</a></li>
                        @endif

				  </ol>
<div>
	<a class="btn btn-dark btn-sm btn-rounded" onclick="goBack()"> ❮ Back</a>
</div>
				</nav>
			</div>	
            
		</div>		
	</section>


	<section class="collection-slider bg-white -internal-slider">
		<div class="container-fluid">
			<div class="col-12 p-0 px-md-3 top-description">


				<div class="col-12">
					<div class="row row_block">
						<div class="col-md-5 col-lg-3 pl-md-0 set_max_20 my_left_side">	
							<div class="sub_categories sub_categories_padding">
								@if($current_sub_categories->count() > 0)
									<h2>SUB CATEGORIES</h2>
									<ul class="d-block p-0 my-3">
										@foreach($current_sub_categories as $current_sub_category)

												<li><a href="{{url('')}}/{{$finalSlug}}{{$current_sub_category->slug}}"><i class="fa fa-chevron-right"></i>{{$current_sub_category->name}}</a></li>
											
										@endforeach
									</ul>
								@endif
									<h3 class="backTo"><a href="{{url('')}}/{{getParentCategory($current_cat->parent_id)['category']['slug']}}"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i> &nbsp; Back to Main Categories</a></h3>	
								
							</div>

					@include('sardar.widget.contact-form1')
						</div>

						<div class="col-md-7 col-lg-9 pr-md-0 set_max_80">
							
							<div class="">
								
				<div class="header-t mb-3 pt-0">
					<h1 class="text-red">{{$current_cat->name}}</h1>
				</div>	

				<div class="">
								<div class="Innerinflatables_slider2 mb-3">

								@foreach($list1 as $list11)
									<div class="inflatables">
									<a href="{{url('')}}/{{$current_cat->slug}}/{{$list11->slug}}"> 
										<div class="top-buttons infa_bg"> 
												<img style="max-width: 18px;margin-right: 10px;"
												src="{{ url('sardar') }}/img/active-link-icon.png">
											{{$list11->name}} </div>
											</a>


											<a href="{{url('')}}/{{$current_cat->slug}}/{{$list11->slug}}"> 
											
										<div class="img_thumbnail m-auto slideshow"  id="slideshow">
										
										@foreach(getProductsFromSubCategory($list11->id) as $i => $productImage)
										
													@if($i < 5)
													<img class="rounded img-block slideshow_img"  width="150" 
														src="{{asset('web')}}/media/sm/{{$productImage->image}}"/>
													@else
														@break
													@endif

													@endforeach

											</div>
</a>


											<?php $finalSlug = '';
												
											
											?>
											@if(isset(getParentCategory($list11->category_id)['category']))

											<?php $finalSlug = getParentCategory($list11->category_id)['category']->slug.'/'; ?>
										@endif

										<div class="bottom_links d-flex justify-content-between">

											<div class="bottom_links1">
												<a href="{{url('')}}/{{$current_cat->slug}}/{{$list11->slug}}"> <i class="fa fa-eye" aria-hidden="true"></i> &nbsp; View All </a>
											</div>
											
											<div class="bottom_links1">
                                    <a class="open-modal" id="{{$list11->id}}"
									data-title="{{$list11->name}}" 
									data-image="{{url('web')}}/media/md/{{$list11->image}}" 
									data-page-url="{{url('')}}/{{$list11->slug}}" 
									data-product-url="{{url('')}}/{{$list11->slug}}" 
                                    
                                            data-target="#exampleModal"
                                            data-toggle="modal" 
                                    > 
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;
                                    <!-- <img class="eye-icon"
                                            src="{{url('sardar')}}/images/email_icon.png" class="img-fluid">  -->
                                            Enquire Now</a>
                                </div>
										</div>	
									</div>
									@endforeach
									
								</div>	
								
								
							</div>
							


	<div class="FieldsTexts bg-white w-100 p-2 ml-1 mb-4">
		<div class="text-left">	
			<p><span class="GreaT"> {{$pageData['meta_title']}}</span></p>	

			{!! html_entity_decode($current_cat->description) !!}
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
  
	<script>
// 		$( ".slideshow" ).each(function( index , item) {
//   console.log( index + ": " + $( this ).text() );
//   alert('test- ' + item);
// });




    $('[data-magnify]').magnify({
      resizable: false,
      initMaximized: true,
      headerToolbar: [
        'close'
      ],
    });

  </script>


  <script type="text/javascript" src="{{url('sardar')}}/js/slick.min.js"></script>
  
  <script type="text/javascript">



  	$('.Innerinflatables_slider2').slick({
      arrows: true,
      infinite: true,
      speed:300,
      autoplay: true,
      slidesToShow:3,
      slidesToScroll:1,
      centerPadding: '50px',
      centerMode: false,
      responsive: [
       
        {
          breakpoint:1200,
          settings: {
            slidesToShow:2
          }
        },
        {
          breakpoint:1000,
          settings: {
            slidesToShow:1,
      		arrows: true

          }
        },
        {
          breakpoint: 767,
          settings: {
            arrows: true,
            centerPadding: '40px',
            slidesToShow: 1
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

// 	var preloader = document.getElementsByClassName('slideshow');
//    for(let fadeElement of preloader){
//     var fadeEffect = setInterval(function () {
//     if (!fadeElement.style.opacity) {
//         fadeElement.style.opacity = 1;
//     }
//     if (fadeElement.style.opacity > 0) {
//         fadeElement.style.opacity -= 0.1;
//     } else {
//         clearInterval(fadeEffect);
//     }
//   }, 200);
// }


        // $('body').fadeOut();

  </script>
@endsection