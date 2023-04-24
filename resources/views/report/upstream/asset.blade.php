@extends('layouts.app')

@section('content')




<div class="row">
        <div class="col-md-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Revenue</h4>

                <ul class="list-inline widget-chart m-t-20 text-center">
                    <li>
                        <h4 class=""><b>5248</b></h4>
                        <p class="text-muted m-b-0">Marketplace</p>
                    </li>
                    <li>
                        <h4 class=""><b></b></h4>
                        <p class="text-muted m-b-0">Last week</p>
                    </li>
                    <li>
                        <h4 class=""><b></b></h4>
                        <p class="text-muted m-b-0">Last Month</p>
                    </li>
                </ul>

                <canvas id="spillChart"></canvas>  <br>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

</div>








@endsection
@section('morris')
{{-- 
 <script type="text/javascript">

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            datasets: [
            @foreach($products as $product)
           
            {
                label: "{{$product->product_name}}",
                backgroundColor: 'rgb('+Math.floor((Math.random() * 170) + 30)+','+Math.floor((Math.random() * 100) + 1)+', '+Math.floor((Math.random() * 180) + 50)+')',
                borderColor: 'rgb(255, 99, 132)',
                data: [ @foreach($months as $month){{Helper::productValue($product->id,$year,$market_segment_id,$month)}}, @endforeach ],
            },

            @endforeach
           ]
        },

        // Configuration options go here
        options: {}
    });
</script> --}}

<script type="text/javascript">
    @php
    $labels=["oil_reserves"=>"Oil reserves","condensate_reserves"=>"Condensate reserves","total_reserves"=>"Total reserves","associated_gas"=>"Associated gas","non_associated_gas"=>"Non Associated gas","total_gas"=>"Total gas"];
    
    @endphp
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @foreach($reserves as $reserve)"{{$reserve->year}}", @endforeach],
            datasets: [
            @foreach($labels as $key=>$label)
          
            {
                label: "{{$label}}", 
                backgroundColor: 'rgb('+Math.floor((Math.random() * 170) + 30)+','+Math.floor((Math.random() * 100) + 1)+', '+Math.floor((Math.random() * 180) + 50)+')',
                borderColor: 'rgb(255, 99, 132)',
                data: [@foreach($reserves as $reserve)"{{$reserve->$key}}", @endforeach],
            },
            @endforeach

           
           ]
        },

        // Configuration options go here
        options: {}
    });
</script>


<script type="text/javascript">
    @php
    $labels=["natural_accident"=>"natural_accident", "corrosion"=>"corrosion", "equipment_failure"=>"equipment_failure", "sabotage"=>"sabotage", "human_error"=>"human_error", "ytbd"=>"ytbd", "mystery"=>"mystery", "total_no_of_spills"=>"total_no_of_spills", "volume_spilled"=>"volume_spilled"];
    
    @endphp
    var ctx = document.getElementById('spillChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'polarArea',

        // The data for our dataset
        data: 
        {
            labels: [ @foreach($spills as $spill)"{{$spill->year}}", @endforeach],
            datasets: 
            [
            @foreach($labels as $key=>$label)
          
            {
                label: "{{$label}}", 
                backgroundColor: 'rgb('+Math.floor((Math.random() * 130) + 30)+','+Math.floor((Math.random() * 150) + 1)+', '+Math.floor((Math.random() * 190) + 50)+')',
                borderColor: '#ffffff',
                data: [@foreach($spills as $spill)"{{$spill->$key}}", @endforeach],
            },
            @endforeach

           
           ]
        },

        // Configuration options go here
        options: {}
    });
</script>

@endsection