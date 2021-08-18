
	<section class="about_giant pb-5 bg-white wiThmap">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1>Connect With Us</h1>
				</div>	

				<div class="many_partition">
					<div class="facebooks_posts">
						{!! html_entity_decode(getSocialMedia()->facebook_embed) !!}
					</div>
					
					<div class="map_part google_map_block" style="max-width:100%">
							{!! html_entity_decode(getSocialMedia()->map_embed) !!}
					</div>
<!-- 
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
					</div>		 -->


					@include('sardar.widget.contact-form1')

					<div class=" bg-white connect_with">
						<div class="ab_logo text-center">	
							<a href="#;">
								<img src="{{url('sardar')}}/images/logo.png" class="img-fluid">
							</a>	
						</div>
						<div class="social_footer text-center d-block">	
							<ul>
								<li><a href="{{getSocialMedia()->youtube}}"><img src="{{url('sardar')}}/images/youtube_icon.png"></a></li>
								<li><a href="{{getSocialMedia()->twitter}}"><img src="{{url('sardar')}}/images/twitter_icon.png"></a></li>
								<li><a href="{{getSocialMedia()->facebook}}"><img src="{{url('sardar')}}/images/fb_icon.png"></a></li>

								
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
						<div class="top-buttons infa_bg d-flex align-items-center"> 
						<img src="{{url('sardar')}}/images/speak-icon.png" class="d-inline-block mr-3"> Client's Speak </div>
						<div class="body_media mb-4">
							<div class="img_thumbnail m-auto">
								<img class="img-fluid" src="{{url('web')}}/media/sm/{{$footerTestimonial->image}}">
							</div>
							<div class="mediaWordFooter">
								<div class="descr">	
								{!! html_entity_decode($footerTestimonial->title) !!}	
								</div>
								<div class="col-12 text-center">	
									<a href="{{url('testimonials')}}" class="d-inline-block red_btn">SEE ALL</a>
								</div>	
							</div>	
						</div>	
					</div>
					<div class="inflatables">
						<div class="top-buttons infa_bg d-flex align-items-center"> <img src="{{url('sardar')}}/images/video_icon.png" class="d-inline-block mr-3"> Giant Infatable in Action </div>
						<div class="body_media mb-4">
							<div class="img_thumbnail m-auto video_thumbnail">

								{!! html_entity_decode($footerVideo->youtube_embed) !!}	

							</div>
							<div class="mediaWordFooter">
								<div class="descr">	
									<p>{{$footerVideo->title}} </p>
								</div>		
								<div class="col-12 text-center">	
									<a href="{{url('videos')}}" class="d-inline-block red_btn">VIEW ALL</a>
								</div>	
							</div>	
						</div>	
					</div>
					<div class="inflatables">
						<div class="top-buttons infa_bg d-flex align-items-center"> <img src="{{url('sardar')}}/images/new_icon.png" class="d-inline-block mr-3"> In News</div>
						<div class="body_media mb-4">	
							<div class="img_thumbnail m-auto">
								<img class="img-fluid" src="{{url('web')}}/media/sm/{{$footerBlog->image}}">
							</div>
							<div class="mediaWordFooter">
								<div class="descr">	
									<p>{{$footerBlog->title}} </p>
								</div>
								<div class="col-12 text-center">	
									<a href="{{url('blog')}}" class="d-inline-block red_btn">CHECK ALL</a>
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


	<section class="experts bg_lightdark">
		<div class="container-fluid">
			<div class="col-12">
				<div class="header-t py-4">
					<h1>Speak with one of our experts</h1>
				</div>	
			</div>	
		</div>	
	</section>

    
	<section class="about_giant py-4">
		<div class="container-fluid">
			<div class="col-12 p-0 px-lg-3">

				<div class="bootomExploreNowslider">
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Information</div>
							<ul class="d-block pl-3">

								<li><a href="{{url('')}}">Home</a></li>
								<li><a href="{{url('products')}}">Our products</a></li>
								<li><a href="{{url('about')}}">About</a></li>
								<li><a href="{{url('blog')}}">Blog</a></li>
								<li><a href="{{url('contact')}}">Contact</a></li>

							</ul>
						</div>						
					</div>
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Categories</div>
							<ul class="d-block pl-3 p-xl-0">
							@foreach($footerCategories as $footerCategory2)
								<li><a href="{{url('product')}}/{{$footerCategory2->slug}}">{{$footerCategory2->name}}</a> </li>
							@endforeach
							</ul>
						</div>						
					</div>
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Products</div>
							<ul class="d-block pl-3 p-xl-0">
								@foreach($footerProducts as $footerProduct2)
									<li><a href="#;">Custom inflatables Games</a> </li>
								@endforeach
								
							</ul>
						</div>						
					</div>
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Blog</div>
							<div class="blog-text">
							
							@foreach($footerBlogs as $footerBlog2)
								<a href="{{url('blog')}}/{{$footerBlog2->slug}}">{{$footerBlog2->title}}</a>
							@endforeach
							</div>	
						</div>						
					</div>
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Testimonials</div>
							<ul class="d-block pl-3 p-xl-0">
							
							@foreach($footerTestimonials as $footerTestimonial2)
								<li><a href="{{url('testimonials')}}">{{$footerTestimonial2->title}}</a> </li>
							@endforeach
							</ul>
						</div>						
					</div>
					
				</div>


			</div>	
		</div>	
	</section>




	<footer class="bg-white">
		<div class="container-fluid">	
			<div class="site-footer">	
				<ul>
					<li><a href="#;">@ Giant Inflatables. All rights reserved. </a></li>
					<li><a href="https://searchmediabroker.com/">
					<p class="text-dark">SEO-SEM-SMM-PPC By:</p>
						<img src="{{url('sardar')}}/images/smb-logo.png" width="200" class="img-fluid"></a>
					</li>		
					<li><p class="text-dark">This website is Designed & Developed by</p> 
					<a href="https://thestudio5.com.au/"><img src="{{url('sardar')}}/images/studio5_logo.jpg"  class="img-fluid"></a></li>	
					<li><p>This Website is protected <img src="{{url('sardar')}}/images/dmca.png" width="100" class="img-fluid ml-3"></p></li>
				
				</ul>
			</div>	
		</div>	
	</footer>
