@extends('home.layout.front-index')
@section('title','WELCOME TO CCPL WORLD An ISO 9001 : 2008 certified company')

@section('custom-js')

@endsection
@section('content')
<style>
.home-about-section{
	background:#f2f2f2;
}
.block-light{
	background:white;
	border-radius:8px;
}
</style>

		<section id="content">
			<div class="content-wrap">

				<div class="promo promo-light promo-full header-stick border-top-0"
				style="
					background:url(http://localhost:8000/home/images/ccpl/world-map.jpg);
					background-size: 90%;
					background-position: 177px 0px;
					background-repeat: no-repeat;
					"
				>

				</div>

				<div class="row clearfix p-3" 
							>
				<div class="row col-mb-50 mb-2 block-style-2">
				
					<div class="heading-block center">
						<h3>TOP INFLATABLES</h3>
						<hr class="hr1"/>
						<span>Home to a huge collection of in-stock and custom</span>					
					</div>

							
	<div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-items-xs="1" data-items-sm="2" data-items-lg="3" data-items-xl="3">

<div class="oc-item m-1 custom-box1">
	<div class="title_bg">
	Custom Giant Infitables
	</div>
		<a href="#"><img class="image-bg" src="{{url('home')}}/images/portfolio/4/4-1.jpg" alt="Image 1"></a>
		<div class="row bottom-button m-0">
			<a class="col text-start link-invert" href=""><i class="icon-line2-eye align-middle" aria-hidden="true"></i>&nbsp;&nbsp;View All</a>
			<a class="col  text-end link-invert" href=""><i class="icon-email3 align-middle" aria-hidden="true"></i>&nbsp;&nbsp;Enquire Now </a>
		</div>
	</div>
</div>


<div class="clear"></div>
				</div>
				
				
				<div class="section parallax m-0 border-0 d-flex"> 
					<div class="vertical-middle">
						<div class="row p-2">

						<div class="heading-block center">
						<h3>Click & Explore</h3>
							<hr class="hr1"/>
							<!-- <span>Home to a huge collection of in-stock and custom</span> -->
						</div>
						<div class="row">
							<div class="title_bg col m-2 link-hover-toggel">
								<a href="#" class="link-invert2 text-strong">
								<img src="{{url('home')}}/images/home/link_hand_icon.png" width="22" alt="">
								&nbsp;&nbsp;Custom Giant Infitables
								</a>
							</div>
							<div class="title_bg col m-2 link-hover-toggel">
								<a href="#" class="link-invert2 text-strong">
								<img src="{{url('home')}}/images/home/link_hand_icon.png" width="22" alt="">
								&nbsp;&nbsp;Custom Giant Infitables
								</a>
							</div>
							<div class="title_bg col m-2 link-hover-toggel">
								<a href="#" class="link-invert2 text-strong">
								<img src="{{url('home')}}/images/home/link_hand_icon.png" width="22" alt="">
								&nbsp;&nbsp;Custom Giant Infitables
								</a>
							</div>
							<div class="title_bg col m-2 link-hover-toggel">
								<a href="#" class="link-invert2 text-strong">
								<img src="{{url('home')}}/images/home/link_hand_icon.png" width="22" alt="">
								&nbsp;&nbsp;Custom Giant Infitables
								</a>
							</div>
							<div class="title_bg col m-2 link-hover-toggel">
								<a href="#" class="link-invert2 text-strong">
								<img src="{{url('home')}}/images/home/link_hand_icon.png" width="22" alt="">
								&nbsp;&nbsp;Custom Giant Infitables
								</a>
							</div>
						</div>

						</div>
					</div>
				</div>

				
				
				<div class="section parallax m-0 border-0 d-flex home-about-section"> 
					<div class="vertical-middle">
						<div class="row p-2">
						<div class="heading-block center">
						<h3>About Giant Inflatable</h3>
							<hr class="hr1"/>
							<!-- <span>Home to a huge collection of in-stock and custom</span> -->
						</div>
						<div class="row px-5">
							<div class="col-md-7 home-about-block px-4">
								<div class="block-light px-2">
								<p class="text-center">
									<img src="{{url('home')}}/images/home/logo.png" width="250px">
								</p>
								<div class="home-about-text">
									<span class="GreaT" style="color:red"> Greetings !</span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
										Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
										Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

								</p>
							</div>
								<p class="text-center">
									<a href="#;" class="red_btn d-inline-block">Read More</a>
								</p>

								</div>
							</div>
							<div class="col-md-2 home-client-block px-2">
							<div class="block-light px-2">
								<h3 class="text-center text-dark p-2 m-0">our clients</h3>
								<img class="col-12" src="{{url('home')}}/images/events/thumbs/1.jpg" alt="">
								<img class="col-12" src="{{url('home')}}/images/events/thumbs/1.jpg" alt="">
							</div>
							</div>
							
							<div class="col-md-3 home-contact-form px-2">
								<div class="block-light px-2">
									<p class="menu-item send-inquiry text-end mb-0" style="font-size: 16px; font-weight: bold">
										<i class="icon-email3 align-middle"></i>&nbsp;&nbsp;<span>SEND YOUR INQUIRY</span></p>
										
										@include('home.widget.contact-form1')
								</div>
							</div>
						</div>

						</div>
					</div>
				</div>

				
				<div class="section parallax m-0 border-0 d-flex home-about-section"> 
					<div class="vertical-middle">
						<div class="row">
							<div class="heading-block center">
							<h3>Speak with one of our experts</h3>
								<hr class="hr1"/>
								<!-- <span>Home to a huge collection of in-stock and custom</span> -->
							</div>
							<div class="row block-light">
								
							<div class="d-flex justify-content-center"> 
										<div class="p-4"><a href="mailto:sales@giantiflatables.com"> <i class="box-shadow1 align-middle icon-email3 bg-light"></i>
											<span class="text-dark text-strong">sales@giantiflatables.com</span></a></div>
										<div class="p-4"><a href="mailto:sales@giantiflatables.com"> <i class="box-shadow1 align-middle icon-chat-3 bg-light"></i>
											<span class="text-dark text-strong">Chat </span> </a></div>
										<div class="p-4"><a href="mailto:sales@giantiflatables.com"> <i class="box-shadow1 align-middle icon-line-phone-call bg-light"></i>
										<span class="text-dark text-strong">(866) 705-1595 </span> </a></div>
							</div>


							<div class="heading-block center">
								<h3>Giant Inflatable Media World</h3>
									<hr class="hr1"/>
							<!-- <span>Home to a huge collection of in-stock and custom</span>	 -->

							<div class="row px-5 mt-2">
								<div class="col">
									<div class="title_bg">Custom Giant Infitables</div>
										<a href="#"><img class="image-bg" src="{{url('home')}}/images/portfolio/4/4-1.jpg" alt="Image 1"></a>
										<div class="bottom-button m-0 text-center">
											<a href="#;" class="d-inline-block red_btn">SEE ALL</a>
										</div>
								</div>
								<div class="col">
									<div class="title_bg">Custom Giant Infitables</div>
										<a href="#"><img class="image-bg" src="{{url('home')}}/images/portfolio/4/4-1.jpg" alt="Image 1"></a>
										<div class="row bottom-button m-0">
											<a class="col text-start link-invert" href=""><i class="icon-line2-eye align-middle" aria-hidden="true"></i>&nbsp;&nbsp;View All</a>
											<a class="col  text-end link-invert" href=""><i class="icon-email3 align-middle" aria-hidden="true"></i>&nbsp;&nbsp;Enquire Now </a>
										</div>
								</div>
								<div class="col">
								
									<div class="title_bg">Custom Giant Infitables</div>
										<a href="#"><img class="image-bg" src="{{url('home')}}/images/portfolio/4/4-1.jpg" alt="Image 1"></a>
										<div class="row bottom-button m-0">
											<a class="col text-start link-invert" href=""><i class="icon-line2-eye align-middle" aria-hidden="true"></i>&nbsp;&nbsp;View All</a>
											<a class="col  text-end link-invert" href=""><i class="icon-email3 align-middle" aria-hidden="true"></i>&nbsp;&nbsp;Enquire Now </a>
										</div>
									</div>
								</div>
								
							</div>

							</div>


							</div>

							
						</div>
					</div>
				</div>


				<div class="row p-0 align-items-stretch">

					<div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: #1abc9c;">
						<div>
							<h3 class="text-uppercase" style="font-weight: 600;">Why choose Us</h3>
							<p style="line-height: 1.8;">
								To give start to end arrangements in plastics. Convey better quality to clients, we have latest machinery and technique 
								 Deliver products in desired timeframe. Customer satisfaction is our main profits.

							<a href="#" class="button button-border button-light button-rounded text-uppercase m-0">Read More</a>
							<i class="icon-bulb bgicon"></i>
						</div>
					</div>

					<div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: #34495e;">
						<div>
							<h3 class="text-uppercase" style="font-weight: 600;">Our Mission</h3>
							<p style="line-height: 1.8;">Frontline respond, visionary collaborative cities advancement overcome injustice, UNHCR public-private partnerships cause. Giving, country educate rights-based approach; leverage disrupt solution.</p>
							<a href="#" class="button button-border button-light button-rounded text-uppercase m-0">Read More</a>
							<i class="icon-cog bgicon"></i>
						</div>
					</div>

					<div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: #e74c3c;">
						<div>
							<h3 class="text-uppercase" style="font-weight: 600;">What you get</h3>
							<p style="line-height: 1.8;">Sustainability involvement fundraising campaign connect carbon rights, collaborative cities convener truth. Synthesize change lives treatment fluctuation participatory monitoring underprivileged equal.</p>
							<a href="#" class="button button-border button-light button-rounded text-uppercase m-0">Read More</a>
							<i class="icon-thumbs-up bgicon"></i>
						</div>
					</div>

				</div>

				<div class="clear"></div>



				<div class="section topmargin-sm mb-0">

					<div class="container clearfix">

						<div class="heading-block center">
							<h3>Testimonials</h3>
							<span>Check out some of our Client Reviews</span>
						</div>

						<ul class="testimonials-grid grid-1 grid-md-2 grid-lg-3">
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="{{url('home')}}/images/testimonials/1.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum repellendus!</p>
										<div class="testi-meta">
											John Doe
											<span>XYZ Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="{{url('home')}}/images/testimonials/2.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
										<div class="testi-meta">
											Collis Ta'eed
											<span>Envato Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="{{url('home')}}/images/testimonials/7.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Fugit officia dolor sed harum excepturi ex iusto magnam asperiores molestiae qui natus obcaecati facere sint amet.</p>
										<div class="testi-meta">
											Mary Jane
											<span>Google Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="{{url('home')}}/images/testimonials/3.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
										<div class="testi-meta">
											Steve Jobs
											<span>Apple Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="{{url('home')}}/images/testimonials/4.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, perspiciatis illum totam dolore deleniti labore.</p>
										<div class="testi-meta">
											Jamie Morrison
											<span>Adobe Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="{{url('home')}}/images/testimonials/8.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Porro dolorem saepe reiciendis nihil minus neque. Ducimus rem necessitatibus repellat laborum nemo quod.</p>
										<div class="testi-meta">
											Cyan Ta'eed
											<span>Tutsplus</span>
										</div>
									</div>
								</div>
							</li>
						</ul>

					</div>

				</div>

				<div class="container clearfix">

					<div id="oc-clients" class="owl-carousel owl-carousel-full image-carousel carousel-widget" data-margin="30" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6" style="padding: 20px 0;">

						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/1.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/2.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/3.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/4.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/5.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/6.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/7.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/8.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/9.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="{{url('home')}}/images/clients/10.png" alt="Clients"></a></div>

					</div>

				</div>

			</div>
		</section>

@endsection