<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						
	<!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
    <h3 class="section-title">Bài viết</h3>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#popular" data-toggle="tab">Bài viết gần đây</a></li>
	</ul>
	<div class="tab-content" style="padding-left:0">
	   <div class="tab-pane active m-t-20" id="popular">

	   	
		<div class="blog-post inner-bottom-30 ">
			@foreach($blog_menu as $item)
			<h4><a href="{{ url('blogs/detail/'.$item->id) }}">{{$item->title}}</a></h4>
			<span class="date-time">{{ App\Models\Blog::find($item->id)->created_at->diffForHumans($now)}}</span>
			@endforeach
		</div>
		
	</div>

	
	</div>
</div>
						
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>