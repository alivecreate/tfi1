
@section('toast')
  @include('adm.widget.toast')
@endsection

	<section class="experts">
		<div class="container-fluid">
			<div class="col-12">
				<div class="header-t py-4">
					<h1><a href="{{url('contact')}}">Speak with one of our experts</a></h1>
				</div>	
			</div>	
		</div>	
	</section>

	<section class="experts bg-white py-4">
		<div class="container-fluid">
			<div class="col-12">
				<ul>
					<li><a href="mailto:{{getSocialMedia()->email}}"> <div class="bXs"><img src="{{url('sardar')}}/images/email_red_icon.png"></div>
						<span>{{getSocialMedia()->email}}</span></a></li>
					<li><a href="{{route('contact')}}"> <div class="bXs"><img src="{{url('sardar')}}/images/chat_red_icon.png"> </div>
						<span>Contact Us </span> </a></li>
					<li><a href="tel:{{getSocialMedia()->phone}}"> <div class="bXs"><img src="{{url('sardar')}}/images/phone_red_icon.png"></div>
					 <span>{{getSocialMedia()->phone}} </span> </a></li>
				</ul>
			</div>	
		</div>	
	</section>
	


	<section class="media_world bg-white">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t">
					<h1>Giant Inflatable Media World</h1>
				</div>	
				
				<div class="notinflatables_slider footer_slider">
					<div class="inflatables my_footer_slider">
						<a href="{{url('testimonials')}}">

						<div class="top-buttons infa_bg d-flex align-items-center"> 
							<img src="{{url('sardar')}}/img/whats-new.png" class="d-inline-block mr-3"
							 style="width: 55px;height: auto !important;">
							<span class="align-middle" style="position: relative;">Client's Speak</span></div></a>
						
						@if($footerTestimonial)
							<div class="body_media">
								<div class="Innerinflatables_slider mb-3">
									@foreach(getDataObjects('testimonials', 3 ,'ASC') as $footerTestimonial)
										<div class="inflatables">
											<a href="{{url('testimonials')}}?testimonial={{$footerTestimonial->id}}">
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('web')}}/media/sm/{{$footerTestimonial->image}}">
											</div>
											</a>
											<div class="Innerinflatables_slider mb-3">
												<div class="mediaWordFooter">
													<div class="descr">	
														<a href="{{url('testimonials')}}?testimonial={{$footerTestimonial->id}}">
															{!! html_entity_decode($footerTestimonial->title) !!}	
														</a>
													</div>
													<div class="col-12 text-center">	
														<a href="{{url('testimonials')}}?testimonial={{$footerTestimonial->id}}" class="d-inline-block red_btn">SEE ALL</a>
													</div>	
												</div>		
											</div>		
										</div>
									@endforeach
								</div>
							</div>
						@endif	

					</div>

					<div class="inflatables my_footer_slider">
							<a href="{{url('videos')}}">
						<div class="top-buttons infa_bg d-flex align-items-center">
								
							<img src="{{url('sardar')}}/img/see-us-on-youtube.png" class="d-inline-block mr-3"
							 style="width: 55px;height: auto !important;">
							
							
							 
							<span class="align-middle" style="position: relative;">Giant Infatable in Action</span></div></a>
						
						@if($footerVideo)
						<div class="body_media mb-4">
							
						<div class="Innerinflatables_slider mb-3">
									@foreach(getDataObjects('videos', 3 ,'ASC') as $footerVideo)
										<div class="inflatables">
											<a href="{{url('testimonials')}}?testimonial={{$footerVideo->id}}">
											<div class="img_thumbnail m-auto video_thumbnail">
												{!! html_entity_decode($footerVideo->youtube_embed) !!}	
											</div>
											</a>
											<div class="Innerinflatables_slider mb-3">
												<div class="mediaWordFooter">
													<div class="descr">	
													<a href="{{url('testimonials')}}?video={{$footerVideo->id}}">
														{!! html_entity_decode($footerVideo->title) !!}	
													</a>

													</div>
													<div class="col-12 text-center">	
														<a href="{{url('testimonials')}}?video={{$footerVideo->id}}" class="d-inline-block red_btn">SEE ALL</a>
													</div>	
												</div>		
											</div>		
										</div>
									@endforeach
								</div>
						</div>	
						@endif	

					</div>
					<div class="inflatables my_footer_slider">
						<a href="{{url('blog')}}">
						<div class="top-buttons infa_bg d-flex align-items-center">

						<img src="{{url('sardar')}}/img/announcement.png" class="d-inline-block mr-3"
							 style="width: 68px;height: auto !important;">

							<span class="align-middle" style="position: relative;">In News</span></div></a>
						
						@if($footerVideo)
						<div class="body_media mb-4">	
							
							<div class="Innerinflatables_slider mb-3">
									@foreach(getDataObjects('blogs', 3 ,'ASC') as $footerBlog)
										<div class="inflatables">
											<a href="{{url('blog')}}/{{$footerBlog->slug}}">
											
											<div class="img_thumbnail m-auto">
												<img class="img-fluid" src="{{url('web')}}/media/sm/{{$footerBlog->image}}">
											</div>

											</a>
											<div class="Innerinflatables_slider mb-3">
												<div class="mediaWordFooter">
													<div class="descr">	

													<a href="{{url('blog')}}/{{$footerBlog->slug}}">
														{!! html_entity_decode($footerBlog->title) !!}	
													</a>

													</div>
													<div class="col-12 text-center">	
														<a href="{{url('blog')}}/{{$footerBlog->slug}}" class="d-inline-block red_btn">SEE ALL</a>
													</div>	
												</div>		
											</div>		
										</div>
									@endforeach
								</div>

						</div>	
						@endif	
						
					</div>

				</div>	

			</div>	
		</div>	
	</section>


	<section class="about_giant pb-4">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1><a href="{{url('products')}}">Explore Now</a></h1>
				</div>	

				<div class="ExploreNowslider">

					@foreach(getMainCategories() as $getMainCategory)

						<div class="explore-slide">
							<div class="ex_inner">
								<a href="{{url('')}}/{{$getMainCategory->slug}}">
								<div class="head-slide explore-now-title">
								                        
								<img style="max-width: 18px;margin-right: 10px;height: 22px;float: left;"
                            class="noHvr" src="{{ url('sardar') }}/img/active-link-icon.png">
								
									{{$getMainCategory->name}}</div></a>
						

								<ul class="d-block">
								
								@foreach(getSubCategories($getMainCategory->id) as $getSubCategory)
									<li> <a href="{{url('')}}/{{$getMainCategory->slug}}/{{$getSubCategory->slug}}">

										<img src="{{url('sardar')}}/images/plus-icon.png" width="15" 
										class="d-inline-block mr-2"> {{$getSubCategory->name}}
										
										</a></li>
								@endforeach

								</ul>
								<a href="{{url('')}}/{{$getMainCategory->slug}}" class="red_btn">More </a>
							</div>				
						</div>
					@endforeach

				</div>


			</div>	
		</div>	
	</section>

	<section class="about_giant pb-5 bg-white wiThmap">
		<div class="container-fluid">
			<div class="col-12">

				<div class="header-t mb-3">
					<h1><a href="{{url('contact')}}">Connect With Us</a></h1>
				</div>	

				<div class="many_partition">
					<div class="facebooks_posts">
						{{-- html_entity_decode(getSocialMedia()->facebook_embed) --}}
						
						
						@if(isset(getSocialMedia()->facebook))
						<a href="{{getSocialMedia()->facebook}}">
						<img src="{{url('sardar')}}/images/facebook-page.png" 
							style="width:100%; max-width:300px;"></a>
						@endif
						
					</div>
					
					<div class="map_part google_map_block" style="max-width:100%">
						<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.198518805097!2d73.17775031490606!3d22.308330685319373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8ad0f8aef55%3A0x4788d9c0fa43addc!2sLalita%20Tower!5e0!3m2!1sen!2sin!4v1625899768295!5m2!1sen!2sin" width="300" height="425" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
					
							{!! html_entity_decode(getSocialMedia()->map_embed) !!}
					</div>

					@include('sardar.widget.contact-form1')


					<div class=" bg-white connect_with">
						<div class="ab_logo text-center">	
							<a href="">
								<img src="{{url('sardar')}}/img/{{getWebsiteOptions()['website_logo']->option_value}}" class="img-fluid">
							</a>	
						</div>
						<div class="social_footer text-center d-block">	
							<ul>
								@if(isset(getSocialMedia()->youtube))
									<li><a href="{{getSocialMedia()->youtube}}"><img src="{{url('sardar')}}/images/youtube.png"></a></li>
								@endif

								@if(isset(getSocialMedia()->twitter))
									<li><a href="{{getSocialMedia()->twitter}}"><img src="{{url('sardar')}}/images/twitter.png"></a></li>
								@endif

								@if(isset(getSocialMedia()->facebook))
									<li><a href="{{getSocialMedia()->facebook}}"><img src="{{url('sardar')}}/images/facebook.png"></a></li>
								@endif

								@if(isset(getSocialMedia()->instagram))
									<li><a href="{{getSocialMedia()->instagram}}"><img src="{{url('sardar')}}/images/instagram.png"></a></li>
								@endif

								@if(isset(getSocialMedia()->linkedin))
									<li><a href="{{getSocialMedia()->linkedin}}"><img src="{{url('sardar')}}/images/linkedin.png"></a></li>
								@endif

								@if(isset(getSocialMedia()->skype))
									<li><a href="{{getSocialMedia()->skype}}"><img src="{{url('sardar')}}/images/skype.png"></a></li>
								@endif
								
								
							</ul>

							<address>{{getSocialMedia()->address}}</address>
						</div>	
					</div>	
					
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

								@foreach(getFooterLinks()['pageLinks'] as $pageLink)
									<li><a href="{{$pageLink->url}}">
										@if($pageLink->name)
											{{$pageLink->name}}
										@endif</a></li>
								@endforeach


							</ul>
						</div>						
					</div>
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Categories</div>
							<ul class="d-block pl-3 p-xl-0">

							@foreach(getFooterLinks()['categoryLinks'] as $categoryLink)
							
									@if(isset($categoryLink->slug))
									<li>
									<a href="{{url('')}}/{{$categoryLink->slug}}">
										@if(isset($categoryLink->display_name))
												{{$categoryLink->display_name}}
											@else
											{{$categoryLink->name}}
											@endif</a>
										
										</li>
									@endif
								
							@endforeach

							</ul>
						</div>						
					</div>
					
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Products</div>
							<ul class="d-block pl-3 p-xl-0">

							
							@foreach(getFooterLinks()['productLinks'] as $productLink)
									@if(isset($productLink->slug))
									<li>
										<?php
										
										$productSlug = getProductUrl(getTableData('products', $productLink->item_id)->category_id).'/'.getTableData('products', $productLink->item_id)->slug;
										?>
									<a href="{{url('')}}/{{$productSlug}}">
									
										@if(isset($productLink->display_name))
												{{$productLink->display_name}}
											@else
											{{$productLink->name}}
											@endif</a>
										</li>
									@endif
								
								@endforeach

							</ul>
						</div>						
					</div>

					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Blog</div>
							<div class="blog-text">
							<ul class="d-block pl-3 p-xl-0">	
							@foreach(getFooterLinks()['blogLinks'] as $blogLink)
							{{-- @if(getTableData('blogs', $blogLink->item_id))
								<?php
									if(isset($blogLink->name)){
										$productName = $blogLink->name;
									}
									else{
										if(isset(getTableData('blogs', $blogLink->item_id)->name)){
											$productName = getTableData('blogs', $blogLink->item_id)->name;
										}else{
											$productName = getTableData('blogs', $blogLink->item_id)->title;
										}				
									}
								?>
									<li><a href="{{url('blog')}}/{{getTableData('blogs', $blogLink->item_id)->slug}}">{{$productName}}</a></li>
								
									@endif --}}

									
									@if(isset($blogLink->slug))
									<li>
									<a href="{{url('blog')}}/{{$blogLink->slug}}">
									
										@if(isset($blogLink->display_name))
												{{$blogLink->display_name}}
											@else
											{{$blogLink->name}}
											@endif</a>
										</li>
									@endif
								
									@endforeach

								</ul>
							</div>	
						</div>						
					</div>
					<div class="bootomexplore-slide">
						<div class="bootomex_inner">
							<div class="bootomhead-slide">Testimonials</div>
							<ul class="d-block pl-3 p-xl-0">
							
							@foreach(getFooterLinks()['testimonialLinks'] as $testimonialLink)
							{{-- @if(getTableData('testimonials', $testimonialLink->item_id))
								<?php
									if(isset($testimonialLink->name)){
										$testimonialName = $testimonialLink->name;
									}
									else{
										if(isset(getTableData('testimonials', $testimonialLink->item_id)->name)){
											$testimonialName = getTableData('testimonials', $testimonialLink->item_id)->name;
										}else{
											$testimonialName = getTableData('testimonials', $testimonialLink->item_id)->title;
										}				
									}
								?>
									<li><a href="{{url('testimonials')}}?testimonial={{getTableData('testimonials', $testimonialLink->item_id)->id}}">{{$testimonialName}}</a></li>
								
								@endif
								--}}

								
								
								@if(isset($testimonialLink))
									<li>
									<a href="{{url('testimonials')}}?testimonial={{$testimonialLink->item_id}}">
										@if(isset($testimonialLink->display_name))
												{{$testimonialLink->display_name}}
											@else
											{{$testimonialLink->name}}
											@endif</a>
										</li>
									@endif
								
								@endforeach

							</ul>
						</div>						
					</div>
					
				</div>


			</div>	
		</div>	
	</section>

	<footer class="bg-white" 
	style="background: url(https://www.skyviewaerialphotography.com.au/images/footer-bg.gif);">
		<div class="container-fluid" 
		style="background: url(https://www.skyviewaerialphotography.com.au/images/footer-bg.gif);">	
			<div class="site-footer">	
				<ul>
							
					<li class="text-center"  style="color: #bbb6b6 !important;">
						<p class="text-dark" style="color: #bbb6b6 !important;">This website is powered by:</p> <a href="https://www.thestudio5.com.au/" title="The Studio5 Australia"><img src="https://www.skyviewaerialphotography.com.au/images/studio5-logo2.png" style="height: 85px;margin-top: 25px;" alt="The Studio5 Australia" class="img-fluid"></a></li>	
					<li class="text-center"><p style="color: #bbb6b6 !important;">This Website is protected <a href="https://www.dmca.com/Protection/Status.aspx?ID=a4028ee2-959b-4c8a-a700-d63422de49a8&amp;refurl=https://www.skyviewaerialphotography.com.au/" title="DMCA.com Protection Status" class="dmca-badge"> <img src="https://images.dmca.com/Badges/dmca_protected_16_120.png?ID=a4028ee2-959b-4c8a-a700-d63422de49a8" alt="DMCA.com Protection Status" class="img-fluid ml-3" width="100"></a></p>
					<br><a href="{{url('')}}"
						 style="color: #bbb6b6 !important;"><span>@ Giant Inflatables.</span>. All Rights Reserved.</a></li>
					<li class="text-left"><p  style="color: #bbb6b6 !important;">SEO-SEM-SMM-PPC By:</p> <a href="https://searchmediabroker.com/" title="Search Media Broker"><img src="https://www.skyviewaerialphotography.com.au/images/smb-logo.png" alt="Search Media Broker" class="img-fluid" style="height:120px;"></a></li>
				</ul>
				  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
			</div>	
		</div>	
	</footer>

	<!-- <footer class="bg-white">
		<div class="container-fluid">	
			<div class="site-footer mt-4">	
				<ul style="
					text-align: center;
					padding: 0px 20%;
				">

		<li><p class="text-dark">This website is Designed & Developed by</p> 
					<a href="https://thestudio5.com.au/">
					<img src="{{url('sardar')}}/images/studio5_logo.jpg"    width="220"
						class="img-fluid mt-4"></a></li>	
					<li>
						<p class="text-center">This Website is protected <img src="{{url('sardar')}}/images/dmca.png" width="100" 
						class="img-fluid ml-3"></p>				
						<p class="text-center"><a href="#;" class="text-center">@ Giant Inflatables. All rights reserved. </a></p>
					</li>
					
					<li><a href="https://searchmediabroker.com/">
					<p class="text-dark">SEO-SEM-SMM-PPC By:</p>
						<img src="{{url('sardar')}}/images/smb-logo.png" width="200" class="img-fluid"></a>
					</li>		
					
				</ul>
				
			</div>	
			
		</div>	
	</footer>
	 -->