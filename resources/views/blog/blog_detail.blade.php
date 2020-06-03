@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
	@include('layouts._breadcrumd')
		<div class="row">
			<div class="blog-page">
				
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
	<img class="img-responsive" src="assets\images\blog-post\blog_big_01.jpeg" alt="">
	<h1>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</h1>
	<span class="author">John Doe</span>
	<span class="review">7 Comments</span>
	<span class="date-time">18/06/2016 11.30AM</span>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	<div class="social-media">
		<span>share post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>
<div class="blog-post-author-details wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
	<div class="row">
		<div class="col-md-2">
			<img src="assets\images\testimonials\member3.png" alt="Responsive image" class="img-circle img-responsive">
		</div>
		<div class="col-md-10">
			<h4>John Doe</h4>
			<div class="btn-group author-social-network pull-right">
				<span>Follow me on</span>
			    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
			    	<i class="twitter-icon fa fa-twitter"></i>
			    	<span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
			    	<li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li>
			    	<li><a href="#"><i class="icon fa fa-linkedin"></i>Linkedin</a></li>
			    	<li><a href=""><i class="icon fa fa-pinterest"></i>Pinterst</a></li>
			    	<li><a href=""><i class="icon fa fa-rss"></i>RSS</a></li>
			    </ul>
			</div>
			<span class="author-job">Web Designer</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
		</div>
	</div>
</div>
					<div class="blog-review wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
	<div class="row">
		<div class="col-md-12">
			<h3 class="title-review-comments">16 comments</h3>
		</div>
		<div class="col-md-2 col-sm-2">
			<img src="assets\images\testimonials\member1.png" alt="Responsive image" class="img-rounded img-responsive">
		</div>
		<div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
			<div class="blog-comments inner-bottom-xs">
				<h4>Jone doe</h4>
				<span class="review-action pull-right">
					03 Day ago /   
					<a href=""> Repost</a> /
					<a href=""> Reply</a>
				</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="blog-comments-responce outer-top-xs ">
				<div class="row">
					<div class="col-md-2 col-sm-2">
						<img src="assets\images\testimonials\member2.png" alt="Responsive image" class="img-rounded img-responsive">
					</div>
					<div class="col-md-10 col-sm-10 outer-bottom-xs">
						<div class="blog-sub-comments inner-bottom-xs">
							<h4>Sarah Smith</h4>
							<span class="review-action pull-right">
								03 Day ago /   
								<a href=""> Repost</a> /
								<a href=""> Reply</a>
							</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
						</div>
					</div>
					<div class="col-md-2 col-sm-2">
						<img src="assets\images\testimonials\member3.png" alt="Responsive image" class="img-rounded img-responsive">
					</div>
					<div class="col-md-10 col-sm-10">
						<div class=" inner-bottom-xs">
							<h4>Stephen</h4>
							<span class="review-action pull-right">
								03 Day ago /   
								<a href=""> Repost</a> /
								<a href=""> Reply</a>
							</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-sm-2">
			<img src="assets\images\testimonials\member4.png" alt="Responsive image" class="img-rounded img-responsive">
		</div>
		<div class="col-md-10 col-sm-10">
			<div class="blog-comments inner-bottom-xs outer-bottom-xs">
				<h4>Saraha Smith</h4>
				<span class="review-action pull-right">
					03 Day ago /   
					<a href=""> Repost</a> /
					<a href=""> Reply</a>
				</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
		</div>
		<div class="col-md-2 col-sm-2">
			<img src="assets\images\testimonials\member1.png" alt="Responsive image" class="img-rounded img-responsive">
		</div>
		<div class="col-md-10 col-sm-10">
			<div class="blog-comment inner-bottom-xs">
				<h4>Mark Doe</h4>
				<span class="review-action pull-right">
					03 Day ago /   
					<a href=""> Repost</a> /
					<a href=""> Reply</a>
				</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
		</div>
		<div class="post-load-more col-md-12"><a class="btn btn-upper btn-primary" href="#">Load more</a></div>
	</div>
</div>					<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
		<div class="col-md-12">
			<h4>Leave A Comment</h4>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-12">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
			    <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
			  </div>
			</form>
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
		</div>
	</div>
</div>
				</div>
				
@include('blog.blog_menu')



			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp" style="visibility: hidden; animation-name: none;">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme" style="opacity: 1; display: block;">
				<div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;"><div class="owl-item" style="width: 190px;"><div class="item m-t-15">
					<a href="#" class="image">
						<img src="assets/images/brands/brand1.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item m-t-10">
					<a href="#" class="image">
						<img src="assets/images/brands/brand2.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand3.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand4.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand5.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand6.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand2.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand4.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div></div></div></div><!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->
		    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
@stop