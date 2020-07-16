<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        @foreach($sliders as $slides)
        <div class="item" style="background-image: url({{ asset('storage/app/sliders/'.$slides->image) }});">
            <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                    <div class="big-text fadeInDown-1">
                        {{ $slides->title }}
                    </div>
                    <div class="excerpt fadeInDown-2 hidden-xs">
                        <span>{{ $slides->content }}</span>
                    </div><!-- 
                    <div class="button-holder fadeInDown-3">
                        <a href="" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                    </div> -->
                </div><!-- /.caption -->
            </div><!-- /.container-fluid -->
        </div><!-- /.item -->
        @endforeach
        
    </div><!-- /.owl-carousel -->
</div>

<div class="info-boxes wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">Hoàn lại tiền</h4>
                                    </div>
                                </div>	
                                <h6 class="text">Đảm bảo hoàn tiên trong 30 ngày</h6>
                            </div>
                        </div><!-- .col -->

                        <div class="hidden-md col-sm-6 col-lg-6">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">free shipping</h4>
                                    </div>
                                </div>
                                <h6 class="text">Miễn phí ship chi đơn hàng trên 3.000.000 </h6>	
                            </div>
                        </div><!-- .col -->

                        
                    </div><!-- /.row -->
                </div><!-- /.info-boxes-inner -->

            </div>