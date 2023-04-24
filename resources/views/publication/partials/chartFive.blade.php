<script> 
//CHARTS


     var optionsPerc = 
     {
        tooltips: { enabled: true },
        plugins: {   precision: 0, datalabels: { formatter: (value, ctx) => {  return value + '%';  },     color: '#fff', }  }
     };

     var optionsData = 
     {
        tooltips: { enabled: true },
        plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: '#fff', }  }
     };

     var optionsTrans = 
     {
        tooltips: { enabled: true },
        plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: 'transparent', }  }
     };






   





    var ctx = document.getElementById('downVSupLineChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($array_year_10)>0) @foreach($array_year_10 as $arr_year_10)"{{$arr_year_10}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Downstream Accident", 
                    backgroundColor: '#007FFF', 
                    borderColor: '#007FFF',
                    fill: false,
                    data: [@if(count($accident_down_chart)>0) @foreach($accident_down_chart as $udown_chart) "{{$udown_chart}}", @endforeach @endif],
                },      
                {
                    label: "Upstream - Accident", 
                    backgroundColor: '#F0E130',  
                    borderColor: '#F0E130',
                    fill: false,
                    data: [@if(count($accident_up_chart)>0) @foreach($accident_up_chart as $up_chart) "{{$up_chart}}", @endforeach @endif],
                },           
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });


    var ctx = document.getElementById('incSafeBarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($array_year_10)>0) @foreach($array_year_10 as $arr_year_10)"{{$arr_year_10}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Incidents", 
                    backgroundColor: '#007FFF', 
                    borderColor: '#ffffff',
                    fill: false,
                    data: [@forelse($incident_chart as $inc_chart) "{{$inc_chart}}", @empty @endforelse],
                },      
                {
                    label: "Work Related", 
                    backgroundColor: '#F0E130',  
                    borderColor: '#ffffff',
                    fill: false,
                    data: [@forelse($work_related_chart as $work_rel_chart) "{{$work_rel_chart}}", @empty @endforelse],
                },      
                {
                    label: "Fatality", 
                    backgroundColor: '#B87333',  
                    borderColor: '#ffffff',
                    fill: false,
                    data: [@forelse($fatality_chart as $fat_chart) "{{$fat_chart}}", @empty @endforelse],
                },

                {{--{--}}
                {{--    label: "Fatality",--}}
                {{--    backgroundColor: '#B87333',--}}
                {{--    borderColor: '#ffffff',--}}
                {{--    fill: false,--}}
                {{--    data: [@forelse($non_work_related_chart as $fat_chart) "{{$fat_chart}}", @empty @endforelse],--}}
                {{--},--}}

           ]
        },

        // Configuration options go here
        options: optionsTrans
    });


    // HSE SPILLS
    var ctx = document.getElementById('spillPieChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($spill_chart)>0) @foreach($spill_chart as $spill_charts)"{{$spill_charts->month}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Natural Accident", 
                    backgroundColor: '#F0E130',  
                    borderColor: '#F0E130',
                    fill: false,
                    data: [@if(count($spill_chart)>0) @foreach($spill_chart as $spill_charts) "{{$spill_charts->natural_accident}}", @endforeach @endif],
                },       
                {
                    label: "Equipment Failure", 
                    // backgroundColor: '#2A52BE',  
                    borderColor: '#2A52BE',
                    // fill: false,
                    data: [@if(count($spill_chart)>0) @foreach($spill_chart as $spill_charts) "{{$spill_charts->equipment_failure}}", @endforeach @endif],
                },        
                {
                    label: "Yet To Be Determined", 
                    // backgroundColor: '#B87333',  
                    borderColor: '#B87333',
                    // fill: false,
                    data: [@if(count($spill_chart)>0) @foreach($spill_chart as $spill_charts) "{{$spill_charts->ytbd}}", @endforeach @endif],
                },              
                {
                    label: "Mystery", 
                    backgroundColor: '#006B3C',  
                    borderColor: '#006B3C',
                    fill: false,
                    data: [@if(count($spill_chart)>0) @foreach($spill_chart as $spill_charts) "{{$spill_charts->mystery}}", @endforeach @endif],
                },  
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });



    // Revenue Actual
    var ctx = document.getElementById('revaPieChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [ @if($actual_legend) @foreach($actual_legend as $legend)"{{$legend}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Revenue Performance ", 
                    backgroundColor: ['#FFA812', '#556B2F', '#986960', '#BDB76B', '#872657', '#007FFF', '#4B5320', '#B87333', '#F0E130', '#8A795D'],  
                    borderColor: '#ffffff',
                    data: [@forelse($actual as $actual_data) "{{number_format((($actual_data * 100) / $totRev), 0)}}", @empty @endforelse],
                },             
           ]
        },

        // Configuration options go here
        options: optionsPerc
    }); 

    var ctx = document.getElementById('revaLineChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($price_legend as $year)"{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Oil Royalty", 
                    backgroundColor: '#FFA812',  
                    borderColor: '#FFA812',
                    fill: false,
                    data: [@forelse($oil_y as $oil_actual) "{{ ($oil_actual / 1000000000) }}", @empty @endforelse],
                },   
                {
                    label: "Gas Sales", 
                    backgroundColor: ['#556B2F'],  
                    borderColor: '#556B2F',
                    fill: false,
                    data: [@forelse($gas_y as $gas_actual) "{{ ($gas_actual / 1000000000) }}", @empty @endforelse],
                }, 
                {
                    label: "Gas Flare", 
                    backgroundColor: ['#986960'],  
                    borderColor: '#986960',
                    fill: false,
                    data: [@forelse($fla_y as $gas_flare_actual) "{{ ($gas_flare_actual / 1000000000) }}", @empty @endforelse],
                },  
                {
                    label: "Concession Rental", 
                    backgroundColor: ['#BDB76B'],  
                    borderColor: '#BDB76B',
                    fill: false,
                    data: [@forelse($con_y as $concession_actual) "{{ ($concession_actual / 1000000000) }}", @empty @endforelse],
                },  
                {
                    label: "MOR", 
                    backgroundColor: ['#872657'],  
                    borderColor: '#872657',
                    fill: false,
                    data: [@forelse($mis_y as $misc_actual) "{{ ($misc_actual / 1000000000) }}", @empty @endforelse],
                },                              
           ]
        },

        // Configuration options go here   007FFF
        options: optionsTrans
    });

  
    $(function()
    {
        $('.summernote').summernote(
        {
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
    });


</script>
    

{{-- 
<script>
    document.getElementById('testBtn').addEventListener('click', function(e)
    {
        e.preventDefault();

        // for demo purposes only we are using below workaround with getDoc() and manual
        // HTML string preparation instead of simple calling the .getContent(). Becasue
        // .getContent() returns HTML string of the original document and not a modified
        // one whereas getDoc() returns realtime document - exactly what we need.
        var contentDocument = document.querySelector('#section-one');
        var content = '<!DOCTYPE html>' + contentDocument.innerHTML;
        var orientation = 'portrait';
        var converted = htmlDocx.asBlob(content, {orientation: orientation});

        saveAs(converted, 'NOGIAR.docx');
    });

</script> --}}