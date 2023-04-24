@extends('layouts.app')

@section('content')







<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bg-warning">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-chart-bar text-danger"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-danger">15</span>
                Total Report
            </div>
            <p class="mb-0 m-t-20 text-muted">Internal Report: 10 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bg-success">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-currency-usd text-success"></i></span>
            <div class="mini-stat-info text-right text-white">
                <span class="counter text-white">956</span>
                New Orders
            </div>
            <p class="mb-0 m-t-20 text-light">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bg-white">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-cube-outline text-warning"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter text-warning">5210</span>
                New Users
            </div>
            <p class="mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="mini-stat clearfix bg-info">
            <span class="mini-stat-icon bg-light"><i class="mdi mdi-currency-btc text-info"></i></span>
            <div class="mini-stat-info text-right text-light">
                <span class="counter text-white">20544</span>
                Unique Visitors
            </div>
            <p class="mb-0 m-t-20 text-light">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
        </div>
    </div>
</div>




<?php $test_contract = \App\contract::all();  ?>


<div class="row">
<div class="col-md-6">  The Chart 
<div class="frame" style=""><canvas id="iChart"></canvas></div> 
</div>
</div>



@endsection

@section('script')

<script type="text/javascript">
    //OML
    
    var ctx = document.getElementById('iChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($test_contract)>0) @foreach($test_contract as $test)"{{$test->contract_name}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Concession By Contract", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@if(count($test_contract)>0) @foreach($test_contract as $test) "{{$test->Bala_oml->count()}}", @endforeach @endif],
                },           
           ]
        },

        // Configuration options go here
        options: {}
    });


</script>



@endsection