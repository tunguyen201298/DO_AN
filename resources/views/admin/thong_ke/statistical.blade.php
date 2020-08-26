@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    mn_selected = 'mn_supplier';</script>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('Trang chủ')}}</a></li>
    <li>Báo cáo thống kê</li>
</ol>
@stop
@section('content')
@include('partials._bootstrap_switch')
<section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#revenue-chart" data-toggle="tab">Tài khoản</a></li>
                <li><a href="#sales-chart" data-toggle="tab">Đơn đặt hàng</a></li>
                <li><button type="button" onclick="getBillChart()"> Xem</button></li>
                <li><label for="input_area_name">{{trans('Tới ngày')}}</label>
            {!! Form::text('end_date', null, array('class' => 'form-control input--style-1 js-datepicker',  'id' => 'input_promotio_end_date', 'placeholder' => trans('Ví dụ: 12/30/2020'))) !!}</li>
                <li>
                    <label for="input_area_name">{{trans('Từ ngày')}}</label>{!! Form::text('star_date',null, array('class' => 'form-control input--style-1 js-datepicker',  'id' => 'input_promotio_star_date', 'placeholder' => trans('Ví dụ: 12/30/2020'))) !!}</li>
                <li class="pull-left header"><i class="fa fa-inbox"></i> Thống kê</li>
            </ul>
            <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
        </div>
        <!-- /.nav-tabs-custom -->


    </section>
@stop
@section('scripts')
<script type="text/javascript">


    var dataDailyCharts = JSON.parse('{!!json_encode($daily)!!}');

    var area = new Morris.Bar({
    element: 'revenue-chart',
    resize: true,
    data: dataDailyCharts,
    xkey: 'date',
    ykeys: ['total'],
    labels: ['VND'],
    lineColors: ['#a0d0e0'],
    hideHover: 'auto',
    xLabelAngle: '45'
  });

    var dataCharts = JSON.parse('{!!json_encode($status_bill_charts)!!}');
    console.log(dataCharts);
    var donut = new Morris.Donut({
    element: 'sales-chart',
    resize: true,
    colors: ["#f39c12","#3c8dbc", "#f56954", "#00a65a"],
    data: dataCharts,
    hideHover: 'auto'
  });


    function getBillChart(){
        var star = $('#input_promotio_star_date').val();
        var end = $('#input_promotio_end_date').val();
        $.ajax({
        type: "POST",
        url: "{{url('admin/bill/get-bill-chart')}}",
        data: { star:star,end:end },
        async: false,
        success: function(data) {
            donut.setData(data);
        }
    });
    }

</script>
@stop