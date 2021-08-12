@extends('sardar.layout.front-index')
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
					<p class="m-0">Our award winning sports orem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
				</div>	
			</div>		
		</div>	
	</section>


	<section class="about_giant pb-5 bg-white wiThmap">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1></h1>
				</div>	

				<div class="many_partition">
					<div class="facebooks_posts">
						<img src="{{url('sardar')}}/images/facebooksdemo.png" class="img-fluid">
					</div>
					
					<div class="map_part">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.198518805097!2d73.17775031490606!3d22.308330685319373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8ad0f8aef55%3A0x4788d9c0fa43addc!2sLalita%20Tower!5e0!3m2!1sen!2sin!4v1625899768295!5m2!1sen!2sin" width="300" height="425" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>


					<div class="enquiry_form bg-white m-md-0 mb-md-0">
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

					<div class=" bg-white connect_with">
						<div class="ab_logo text-center">	
							<a href="#;">
								<img src="{{url('sardar')}}/images/logo.png" class="img-fluid">
							</a>	
						</div>
						<div class="social_footer text-center d-block">	
							<ul>
								<li><a href="#;"><img src="{{url('sardar')}}/images/youtube_icon.png"></a></li>
								<li><a href="#;"><img src="{{url('sardar')}}/images/printrest_icon.png"></a></li>
								<li><a href="#;"><img src="{{url('sardar')}}/images/twitter_icon.png"></a></li>
								<li><a href="#;"><img src="{{url('sardar')}}/images/fb_icon.png"></a></li>
							</ul>

							<address>504, Lalita Tower, Nr.Railway Station, VADODARA</address>
						</div>	
					</div>	
					
				</div>	

			</div>	
		</div>	
	</section>


	<section class="media_world bg-white">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t">
					<h1>Giant Inflatable Media World</h1>
				</div>	

				<div class="notinflatables_slider">
					<div class="inflatables">
						<div class="top-buttons infa_bg d-flex align-items-center"> <img src="{{url('sardar')}}/images/speak-icon.png" class="d-inline-block mr-3"> Custom Infatable Game </div>
						<div class="body_media mb-4">
							<div class="img_thumbnail m-auto">
								<img class="img-fluid" src="{{url('sardar')}}/images/media_img_1.jpg">
							</div>
							<div class="mediaWordFooter">
								<div class="descr">	
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
								</div>
								<div class="col-12 text-center">	
									<a href="#;" class="d-inline-block red_btn">SEE ALL</a>
								</div>	
							</div>	
						</div>	
					</div>
					<div class="inflatables">
						<div class="top-buttons infa_bg d-flex align-items-center"> <img src="{{url('sardar')}}/images/video_icon.png" class="d-inline-block mr-3"> Custom Infatable Game </div>
						<div class="body_media mb-4">
							<div class="img_thumbnail m-auto">
								<img class="img-fluid" src="{{url('sardar')}}/images/media_img_2.jpg">
								<div class="Play_Vbtn">
									<img class="img-fluid IconVideo" src="{{url('sardar')}}/images/video_play_button.png">
								</div>
							</div>
							<div class="mediaWordFooter">
								<div class="descr">	
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
								</div>		
								<div class="col-12 text-center">	
									<a href="#;" class="d-inline-block red_btn">VIEW ALL</a>
								</div>	
							</div>	
						</div>	
					</div>
					<div class="inflatables">
						<div class="top-buttons infa_bg d-flex align-items-center"> <img src="{{url('sardar')}}/images/new_icon.png" class="d-inline-block mr-3"> Custom Infatable Game </div>
						<div class="body_media mb-4">	
							<div class="img_thumbnail m-auto">
								<img class="img-fluid" src="{{url('sardar')}}/images/media_img_3.jpg">
							</div>
							<div class="mediaWordFooter">
								<div class="descr">	
									<p><b>Inflatables for the 2017 AFL season:</b></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
								</div>
								<div class="col-12 text-center">	
									<a href="#;" class="d-inline-block red_btn">CHECK ALL</a>
								</div>	
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</section>


	<section class="about_giant pb-4">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1>Explore Now</h1>
				</div>	

				<div class="ExploreNowslider">
					<div class="explore-slide">
						<div class="ex_inner">
							<div class="head-slide">Custom Inflatable Games</div>
							<ul class="d-block">
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Arenas Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> FArenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields Courts</li>
							</ul>
							<a href="#;" class="red_btn">More </a>
						</div>						
					</div>
					<div class="explore-slide">
						<div class="ex_inner">
							<div class="head-slide">Custom Inflatable Games</div>
							<ul class="d-block">
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Arenas Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> FArenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields Courts</li>
							</ul>
							<a href="#;" class="red_btn">More </a>
						</div>
					</div>
					<div class="explore-slide">
						<div class="ex_inner">
							<div class="head-slide">Custom Inflatable Games</div>
							<ul class="d-block">
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Arenas Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> FArenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields Courts</li>
							</ul>
							<a href="#;" class="red_btn">More </a>
						</div>
					</div>
					<div class="explore-slide">
						<div class="ex_inner">
							<div class="head-slide">Custom Inflatable Games</div>
							<ul class="d-block">
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Arenas Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> FArenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields Courts</li>
							</ul>
							<a href="#;" class="red_btn">More </a>
						</div>
					</div>
					<div class="explore-slide">
						<div class="ex_inner">
							<div class="head-slide">Custom Inflatable Games</div>
							<ul class="d-block">
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Arenas Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> FArenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields Courts</li>
							</ul>
							<a href="#;" class="red_btn">More </a>
						</div>
					</div>
					<div class="explore-slide">
						<div class="ex_inner">
							<div class="head-slide">Custom Inflatable Games</div>
							<ul class="d-block">
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields, Arenas, And</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Arenas Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> FArenas, And Courts</li>
								<li><img src="{{url('sardar')}}/images/plus-icon.png" width="15" class="d-inline-block mr-2"> Fields Courts</li>
							</ul>
							<a href="#;" class="red_btn">More </a>
						</div>
					</div>
				</div>


			</div>	
		</div>	
	</section>

@endsection