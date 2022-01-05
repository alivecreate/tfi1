@extends('sardar.layout.front-index')
@section('title','')

@section('custom-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
.loader img{
    width:0px;
}
        </style>
    <script>




  setTimeout(() => {
	
    $(".gsc-search-button .gsc-search-button-v2").addClass( "btn find-btn");
    $(".gsc-search-button .gsc-search-button-v2").text('Find');
  
  }, 10000);
  
        $('#myCarousel').on('slide.bs.carousel', function() {
            // do something…
        })

//         $( document ).ready(function() {
//   $(".open-modal").click(function(){
//     //   alert('test');
//     var data_image = $(this).attr('data-image');
//     var data_type = $(this).attr('data-type');
//     var data_title = $(this).attr('data-title');
//     var data_clientName = $(this).attr('data-clientName');
//     var data_short_description = $(this).attr('data-short_description');
//     var data_full_description = $(this).attr('data-full_description');
//     var data_product_url = $(this).attr('data-product-url');

// 		$('.card-product-url').val(data_product_url);
// 		$('.card-img').attr('src',data_image);
// 		$('.card-title').val(data_title);
// 		$('.card-client').html(data_clientName);
// 		$('.short-description').html(data_short_description);
// 		$('.full-description').html(data_full_description);


		
// 	});     
// });


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
  


        $(".home").addClass("active");

//         $(document).ready(function () {
//   $( ".lazyload" ).css('overflow', 'auto');
//   $( ".loader" ).hide();

// });

    </script>
@include('sardar.widget.enquire-now2')
@endsection
@section('content')

    
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel"
    style=""
    >
        <ol class="carousel-indicators">
            @foreach ($sliders as $key => $slider)
                <li data-target="#carousel-example-2" data-slide-to="{{ $key }}" class="@if ($key==0) active @endif"></li>
            @endforeach
        </ol>

        <div class="carousel-inner" role="listbox">
            @foreach ($sliders as $key => $slider)

                <div class="carousel-item @if ($key==0) active @endif">
                    <div class="view">
                        <img class="absolute_img d-block w-100" src="{{ url('web') }}/media/lg/{{ $slider->image }}"
                            alt="{{$slider->description}}">
                            
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption content_banners">
                        <h3 class="h3-responsive">{{ $slider->title }}</h3>
                     <a href="{{ $slider->url }}" class="view_now">View Now </a>
                    </div>
                </div>
                
                 <!-- <div class="carousel-item @if ($key==0) active @endif">
                    <div class="view">
                        <img class="d-block w-100" src="{{ url('web') }}/media/lg/{{ $slider->image }}"
                            alt="{{$slider->description}}">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption content_banners text-center">
                        <h3 class="h3-responsive">{{ $slider->title }}<br>
                        <a href="{{ $slider->url }}" class="view_now">View Now </a>
                        </h3>
                    </div>
                </div> -->
                
            @endforeach

            @if($sliders->count() > 1)
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

            @endif
        </div>
        <!-- <img src="{{url('')}}/sardar/img/bottom-border.png" alt=""> -->
      
    </div>


    @if (isset($sliders->youtube_embed))
        {!! html_entity_decode($sliders->youtube_embed) !!}
    @endif
   
    <?php

    // dd(array_chunk($topInflatableAll, 2));

// foreach(array_chunk($topInflatableAll, 2) as $topInflatableAll1){
//     print_r($topInflatableAll1);
// }

?>


    <section class="collection-slider bg-white">
        <div class="container-fluid">
            <div class="col-12">

            <div class="header-t">
					<h1><a href="{{url('products')}}">TOP INFLATABLES</a></h1>
					<p>Home to a huge collection of in-stock and custom</p>
				</div>
                

                <div class="row big_slide mb-3 justify-content-center">
                    @foreach($topInflatableAll as $topInflatable)

                        @if(getSubCategories($topInflatable->id)->count() > 0)

                        <div class="col-sm-4 inflatables item-block">
                        <a href="{{url('')}}/{{$topInflatable->slug}}">
                        
                            <div class="top-buttons infa_bg">

                                <img  style="max-width: 18px;margin-right: 10px;"
                                src="{{ url('sardar') }}/img/active-link-icon.png">

                            {{$topInflatable->name}}</div></a>
                            <a href="{{url('')}}/{{$topInflatable->slug}}">

                            <div class="img_thumbnail m-auto slideshow">
                                    @foreach(getSubCategories($topInflatable->id) as $subCategories1)
                                        @if(isset(getSubCategoryImages($subCategories1->id, 2, 'DESC')[0]))
                                            @foreach(getSubCategoryImages($subCategories1->id, 2, 'DESC') as $i => $media)
                                                <img class="img-fluid slideshow_img" src="{{url('web')}}/media/md/{{$media['image']}}">
                                            @endforeach
                                        @else
                                        @endif
                                    @endforeach
                            </div>
                            </a>
                            
                            <div class="bottom_links d-flex justify-content-between">
                                <div class="bottom_links1">
                                    <a href="{{url('')}}/{{$topInflatable->slug}}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                    <!-- <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png"
                                            class="img-fluid">  -->
                                            View All </a>
                                </div>
                               
                                <div class="bottom_links1">
                                    <a class="open-modal" id="{{$topInflatable->id}}"
									data-title="{{$topInflatable->name}}" 
									data-image="{{url('web')}}/media/md/{{$topInflatable->image}}" 
									data-page-url="{{url('')}}/{{$topInflatable->slug}}" 
									data-product-url="{{url('')}}/{{$topInflatable->slug}}" 
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
                        @endif
                @endforeach
                </div>
            <h1>Exit Loop</h1>
                <!-- TOP INFLATABLES 1 -->
                <div class="inflatables_slider big_slide mb-3">
                    @foreach($topInflatables1 as $topInflatable1)
                    
                    @if(getChildCategoryCount($topInflatable1->id, 'childcategory|image'))
                        <div class="inflatables item-block">
                        <a href="{{url('')}}/{{$topInflatable1->slug}}">
                        
                            <div class="top-buttons infa_bg">

                                <img  style="max-width: 18px;margin-right: 10px;"
                                src="{{ url('sardar') }}/img/active-link-icon.png">

                            {{$topInflatable1->name}}</div></a>
                            <a href="{{url('')}}/{{$topInflatable1->slug}}">

                            <div class="img_thumbnail m-auto slideshow">
                                    @foreach(getSubCategories($topInflatable1->id) as $subCategories1)
                                        @if(isset(getSubCategoryImages($subCategories1->id, 2, 'DESC')[0]))
                                            @foreach(getSubCategoryImages($subCategories1->id, 2, 'DESC') as $i => $media)
                                                <img class="img-fluid slideshow_img" src="{{url('web')}}/media/md/{{$media['image']}}">
                                            @endforeach
                                        @else
                                        @endif
                                    @endforeach
                            </div>
                            </a>
                            
                            <div class="bottom_links d-flex justify-content-between">
                                <div class="bottom_links1">
                                    <a href="{{url('')}}/{{$topInflatable1->slug}}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                    <!-- <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png"
                                            class="img-fluid">  -->
                                            View All </a>
                                </div>
                               
                                <div class="bottom_links1">
                                    <a class="open-modal" id="{{$topInflatable1->id}}"
									data-title="{{$topInflatable1->name}}" 
									data-image="{{url('web')}}/media/md/{{$topInflatable1->image}}" 
									data-page-url="{{url('')}}/{{$topInflatable1->slug}}" 
									data-product-url="{{url('')}}/{{$topInflatable1->slug}}" 
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
                        @endif
                    @endforeach
                </div>

                <!-- TOP INFLATABLES 2 -->
                <div class="inflatables_slider big_slide mb-3">
                    @foreach($topInflatables2 as $topInflatables22)
                    
                    @if(getChildCategoryCount($topInflatables22->id, 'childcategory|image'))
                        <div class="inflatables item-block">
                        <a href="{{url('')}}/{{$topInflatables22->slug}}">
                        
                            <div class="top-buttons infa_bg">

                                <img style="max-width: 18px;margin-right: 10px;"
                                src="{{ url('sardar') }}/img/active-link-icon.png">

                            {{$topInflatables22->name}}</div></a>
                            <a href="{{url('')}}/{{$topInflatables22->slug}}">
                            <div class="img_thumbnail m-auto slideshow">


                            @foreach(getSubCategories($topInflatables22->id) as $subCategories2)
                                @if(isset(getSubCategoryImages($subCategories2->id, 2, 'DESC')[0]))
                                    @foreach(getSubCategoryImages($subCategories2->id, 2, 'DESC') as $i => $media)
                                        <img class="img-fluid slideshow_img" src="{{url('web')}}/media/md/{{$media['image']}}">
                                    @endforeach
                                @else
                                @endif
                            @endforeach

                            </div>
                            </a>
                            <div class="bottom_links d-flex justify-content-between">
                                <div class="bottom_links1">
                                    <a href="{{url('')}}/{{$topInflatables22->slug}}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                    <!-- <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png"
                                            class="img-fluid">  -->
                                            View All </a>
                                </div>
                               
                                <div class="bottom_links1">
                                    <a class="open-modal" id="{{$topInflatables22->id}}"
									data-title="{{$topInflatables22->name}}" 
									data-image="{{url('web')}}/media/md/{{$topInflatables22->image}}" 
									data-page-url="{{url('')}}/{{$topInflatables22->slug}}" 
									data-product-url="{{url('')}}/{{$topInflatables22->slug}}" 
                                    
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
                        @endif
                    @endforeach
                </div>



                <!-- TOP INFLATABLES 3 -->
                <div class="inflatables_slider big_slide mb-3">
                    @foreach($topInflatables3 as $topInflatable33)

                    @if(getChildCategoryCount($topInflatable33->id, 'childcategory|image'))
                        <div class="inflatables item-block">
                        <a href="{{url('')}}/{{$topInflatable33->slug}}">
                        
                            <div class="top-buttons infa_bg">

                                <img style="max-width: 18px;margin-right: 10px;"
                                src="{{ url('sardar') }}/img/active-link-icon.png">

                            {{$topInflatable33->name}}</div></a>
                            <a href="{{url('')}}/{{$topInflatable33->slug}}">
                            <div class="img_thumbnail m-auto slideshow">
                                
                            @foreach(getSubCategories($topInflatable33->id) as $subCategories3)
                                @if(isset(getSubCategoryImages($subCategories3->id, 2, 'DESC')[0]))
                                    @foreach(getSubCategoryImages($subCategories3->id, 2, 'DESC') as $i => $media)
                                        <img class="img-fluid slideshow_img" src="{{url('web')}}/media/md/{{$media['image']}}">
                                    @endforeach
                                @else
                                @endif
                            @endforeach


                            </div>
                            </a>
                            <div class="bottom_links d-flex justify-content-between">
                                <div class="bottom_links1">
                                    <a href="{{url('')}}/{{$topInflatable33->slug}}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                    <!-- <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png"
                                            class="img-fluid">  -->
                                            View All </a>
                                </div>
                               
                                <div class="bottom_links1">
                                    <a class="open-modal" id="{{$topInflatable33->id}}"
									data-title="{{$topInflatable33->name}}" 
									data-image="{{url('web')}}/media/md/{{$topInflatable33->image}}" 
									data-page-url="{{url('')}}/{{$topInflatable33->slug}}" 
									data-product-url="{{url('')}}/{{$topInflatable33->slug}}" 
                                    
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
                        @endif
                    @endforeach
                </div>




                <!-- TOP INFLATABLES 4 -->
                <div class="inflatables_slider big_slide mb-3">
                    @foreach($topInflatables4 as $topInflatable44)
                    @if(getChildCategoryCount($topInflatable44->id, 'childcategory|image'))
                        <div class="inflatables item-block">
                        <a href="{{url('')}}/{{$topInflatable44->slug}}">
                        
                            <div class="top-buttons infa_bg">

                                <img style="max-width: 18px;margin-right: 10px;"
                                src="{{ url('sardar') }}/img/active-link-icon.png">

                            {{$topInflatable44->name}}</div></a>
                            <a href="{{url('')}}/{{$topInflatable44->slug}}">
                            <div class="img_thumbnail m-auto slideshow">
                            

                            @foreach(getSubCategories($topInflatable44->id) as $subCategories4)
                                @if(isset(getSubCategoryImages($subCategories4->id, 2, 'DESC')[0]))
                                    @foreach(getSubCategoryImages($subCategories4->id, 2, 'DESC') as $i => $media)
                                        <img class="img-fluid slideshow_img" src="{{url('web')}}/media/md/{{$media['image']}}">
                                    @endforeach
                                @else
                                @endif
                            @endforeach

                            </div>
                            </a>
                            <div class="bottom_links d-flex justify-content-between">
                                <div class="bottom_links1">
                                    <a href="{{url('')}}/{{$topInflatable44->slug}}">
                                    <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                    <!-- <img class="eye-icon" src="{{url('sardar')}}/images/view_icon.png"
                                            class="img-fluid">  -->
                                            View All </a>
                                </div>
                               
                                <div class="bottom_links1">
                                    <a class="open-modal" id="{{$topInflatable44->id}}"
									data-title="{{$topInflatable44->name}}" 
									data-image="{{url('web')}}/media/md/{{$topInflatable44->image}}" 
									data-page-url="{{url('')}}/{{$topInflatable44->slug}}" 
									data-product-url="{{url('')}}/{{$topInflatable44->slug}}" 
                                    
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
                        @endif
                    @endforeach
                </div>


            </div>
            
        </div>
    </section>

    <section class="about_giant pb-5">
        <div class="container-fluid">
            <div class="col-12">

                <div class="header-t mb-3">
                    <h1><a href="{{url('about')}}">About Giant Inflatable</a></h1>
                </div>

                <div class="many_partition">
                    <div class="about_part bg-white col-md-7 col-sm-12">
                        <div class="ab_logo text-center">
                            <img src="{{url('sardar')}}/img/{{getWebsiteOptions()['website_logo']->option_value}}"
                                 class="img-fluid">
                        </div>
                        <div class="text-left">
                            <p><span class="GreaT"> Greetings ! </span></p>
                            {!! html_entity_decode($homeAbout->description, ENT_QUOTES, 'UTF-8') !!}
                        </div>
                        <div class="home-readmore">
                            <a href="{{$homeAbout->url}}" class="red_btn d-inline-block">Read More</a>
                        </div>
                    </div>

                    <div class="our_clients bg-white col-md-2 col-sm-12 p-0">
                        <h2 class="mb-0 pb-0">our clients</h2>

         <div class="client-diplay">

        <div class="col-sm-12">
            <div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="1000">
                <div class="carousel-inner vertical">

                <div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>

                @foreach($clients as $key => $client)
                @if($key < 2)
                <li><img src="{{ url('web') }}/media/lg/{{ $client->logo }}" width="200" height="200" alt=""></li>
                
                @endif

                @endforeach
                
                      
                    </ul>
                </div>
            </div>



                </div>
                
                <!-- <a class="left carousel-control" href="#carousel-pager" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-pager" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
                
            </div>
        </div>


            </div>
                    </div>

                    @include('sardar.widget.contact-form1')

                </div>

            </div>
        </div>
    </section>


  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    // var count = 1;
    // setInterval(function() {
    // //   alert(count ++ );

    //     $('body').fadeOut();
    //     // count = $(".slideshow img:nth-child("+count+")").fadeOut(1000).next();

    //     // $(".slideshow img:nth-child("+count+")").fadeOut(1000).end();
    // }, 3000);


</script>

@endsection
