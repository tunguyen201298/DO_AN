@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    //mn_selected = 'mn_dashboard';
</script>
<ol class="breadcrumb">
    <li><a href="javascript:;"><i class="fa fa-dashboard"></i> {{$title}}</a></li>
</ol>
@stop
@section('content')
<!-- Small boxes (Stat box) -->

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
        <h2>Xin chào   @if(Auth::check()){{Auth::user()->name}}@endif</h2>
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->

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


    function getBillChart(dieu_kien){
        $.ajax({
        type: "POST",
        url: "router-get-data",
        data: { waterTemperature: true },
        async: false,
        success: function(data) {
            donut.setData(data);
        }
    });
    }

</script>
@stop