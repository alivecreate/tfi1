@extends('sardar.layout.front-index')
@section('title','Product Details')

@section('custom-js')

@endsection
@section('content')

@include('sardar.ext.slider')


<section class="clickANDexplore bg-white pb-0">
		<div class="container-fluid">
			<div class="col-12 p-0 px-lg-3">

				<div class="header-t mb-3">
					<h1>TOP INFLATABALES</h1>
				</div>	

				<div class="ParentclickExplore">
					<div class="c_explores"><a href="#;" class="btn clickExplore active"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr"> Trade Shows </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> High Visibility &amp; Events </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> Trade Shows </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> Trade Shows </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> Trade Shows </a></div>
				</div>
				<div class="ParentclickExplore">
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr"> Trade Shows </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> Trade Shows </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> Trade Shows </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> Trade Shows </a></div>
					<div class="c_explores"><a href="#;" class="btn clickExplore"><img class="noHvr" src="{{url('sardar')}}/images/link_hand_icon.png"><img src="{{url('sardar')}}/images/active_link_icon.png" class="InHvr "> Trade Shows </a></div>
				</div>		
			</div>	
		</div>	
	</section>

	<section class="bg-white MyBreadcrumb">
		<div class="container-fluid">
			<div class="">
				<nav aria-label="breadcrumb" class="pl-2">
				  <ol class="breadcrumb m-0 bg-white">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item"><a href="#">Giant Inflatable Products</a></li>
				    <li class="breadcrumb-item active" aria-current="page">custom inflatable games</li>
				  </ol>
				</nav>
			</div>	
		</div>		
	</section>


	<section class="collection-slider bg-white product-internal-slider">
		<div class="container-fluid">
			<div class="col-12 p-0 px-md-3">

				<div class="header-t mb-3">
					<h1>CUSTOM INFLATABLE GAMES</h1>
					<!-- <div class="BrdR"></div> -->
				</div>	

				<div class="col-12">
					<div class="row">
						<div class="col-md-5 col-lg-3 pl-md-0 set_max_20">	
							<div class="sub_categories">
								<h2>SUB CATEGORIES</h2>
								<ul class="d-block p-0 my-3">
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
									<li><a href="#;"><i class="fa fa-chevron-right"></i>Fields, Arenas, And Courts</a></li>
								</ul>
								<h3 class="backTo"><a href=""><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i> &nbsp; Back to Main Categories</a></h3>	
							</div>
							<div class="sidebar_enquiry_form">
								<div class="enquiry_form bg-white ml-0">
									<div class="form_header">
										<img src="{{url('sardar')}}/images/email_icon.png" class="img-fluid">
										<h2>SEND US YOUR ENQUIRY</h2>
									</div>	
									<form class="m-0">
										<div class="form-group">
											<div class="frm_dv"><img width="20" src="{{url('sardar')}}/images/name_icon.png" class="img-fluid"></div> 
											<input type="text" placeholder="Name" name=""> 
										</div>
										<div class="form-group">
											<div class="frm_dv"><img width="15" src="{{url('sardar')}}/images/mobile_icon.png" class="img-fluid"></div> 
											<input type="number" placeholder="Phone Number" name=""> 
										</div>
										<div class="form-group">
											<div class="frm_dv"><img width="25" src="{{url('sardar')}}/images/email_icon_b.png" class="img-fluid"></div> 
											<input type="text" placeholder="Email" name=""> 
										</div>
										<div class="form-group">
											<div class="frm_dv"><img width="20" src="{{url('sardar')}}/images/gbl.png" class="img-fluid"></div> 
											<select>
												<option selected="">Select Country</option>
												<option>India</option>
												<option>India</option>
												<option>India</option>
											</select>
										</div>
										<div class="form-group">
											<div class="frm_dv"><img width="20" src="{{url('sardar')}}/images/share_icon.png" class="img-fluid"></div> 
											<textarea name="textarea-326" placeholder="Share Your Inflatables Requirement"></textarea>
										</div>
										<div class="text-center"> 
											<a href="#;" class="term_Link d-block mb-4"> Your information is sage with us. We do not sell or rent emails. </a> 
											<a href="#;" class="red_btn">Submit</a>
										</div>

									</form>
								</div>
							</div>	
						</div>
						<div class="col-md-7 col-lg-9 pr-md-0 set_max_80">
							<div class="">

								<div class="BigInnerinflatableSub_slider mb-3">
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_b.png">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_b.png">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_b.png">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_b.png">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_b.png">
										</div>
									</div>
									<div class="Biginflatables">
										<div class="img_thumbnail m-auto">
											<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
										</div>
									</div>
								</div>	

								<div class="col-md-12 mb-4">	
									<div class="BigInnerinflatableSub_Nav mb-3">

										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/product_img_1.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/product_img_1.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/product_img_1.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/product_img_1.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/product_img_1.jpg">
											</div>
										</div>
										<div class="thumb_big_slider">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('sardar')}}/images/big_c.jpg">
											</div>
										</div>
									</div>
								</div>	


								<div class="FieldsTexts bg-white w-100 p-2 ml-1">
									<div class="text-left">	
										<p><span class="GreaT"> Fields, Arenas, and Courts </span></p>	
										<p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
										<p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
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
  
  <script type="text/javascript" src="{{url('sardar')}}/js/slick.min.js"></script>
  
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