@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
	@include('layouts._breadcrumd')
		<div class="row">
			<div class="blog-page">
				
				<div class="col-md-9">

					<div class="blog-post wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
						<h1>Giới Thiệu Về Shop</h1>
						<hr>
	<img class="img-responsive" src="{{asset('storage/app/blog-post/'.$blog_detail->image)}}" alt="Hình ảnh bài viết" style="width: 800px">
	<h1>{{$blog_detail->title}}</h1>
	<span class="date-time">{{$blog_detail->created_at}}</span>
	<p>{!! $blog_detail->content !!}</p>
	<div class="social-media">
		<span>Chia sẻ:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>
		<div class="blog-write-comment outer-bottom-xs outer-top-xs">
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
				</div></div></div><!--/.item-->

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