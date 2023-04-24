<script>


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

     var optionsTransStacked = 
     {
        tooltips: { enabled: true },
        plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: '#fff', }  },
          scales: {
             xAxes: [{ stacked: true}], // this should be set to make the bars stacked 
             yAxes: [{ stacked: true }] // this also..
          }
     };

     
	
    //PMS vs AGO vs DPK vs ATK CHARTS
    var ctx = document.getElementById('pmsChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_9 as $year)"{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "NNPC", 
                    backgroundColor: ['#007FFF'],  
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($PMS_NN as $NNPC) "{{$NNPC / 1000000}}", @empty @endforelse],
                },      
                {
                    label: "Major Marketers", 
                    backgroundColor: ['#6D351A'],  
                    borderColor: '#6D351A',
                    fill: false, 
                    data: [@forelse($PMS_MJ as $MAJOR) "{{$MAJOR / 1000000}}", @empty @endforelse],
                },       
                {
                    label: "Independent Marketers", 
                    backgroundColor: ['#006B3C'],  
                    borderColor: '#006B3C',
                    fill: false, 
                    data: [ @forelse($PMS_ID as $INDI) "{{$INDI / 1000000}}", @empty @endforelse],
                },            
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });

    var ctx = document.getElementById('agoChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_9 as $array_y)"{{$array_y}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "NNPC", 
                    backgroundColor: ['#007FFF'],  
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($AGO_NN as $NNPC) "{{$NNPC / 1000000}}", @empty @endforelse],
                },      
                {
                    label: "Major Marketers", 
                    backgroundColor: ['#6D351A'],  
                    borderColor: '#6D351A',
                    fill: false, 
                    data: [@forelse($AGO_MJ as $MAJOR) "{{$MAJOR / 1000000}}", @empty @endforelse],
                },       
                {
                    label: "Independent Marketers", 
                    backgroundColor: ['#006B3C'],  
                    borderColor: '#006B3C',
                    fill: false, 
                    data: [@forelse($AGO_ID as $INDI) "{{$INDI / 1000000}}", @empty @endforelse],
                },            
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });

    var ctx = document.getElementById('dpkChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_9 as $array_y)"{{$array_y}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "NNPC", 
                    backgroundColor: ['#007FFF'],  
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($DPK_NN as $NNPC) "{{$NNPC / 1000000}}", @empty @endforelse],
                },      
                {
                    label: "Major Marketers", 
                    backgroundColor: ['#6D351A'],  
                    borderColor: '#6D351A',
                    fill: false, 
                    data: [@forelse($DPK_MJ as $MAJOR) "{{$MAJOR / 1000000}}", @empty @endforelse],
                },       
                {
                    label: "Independent Marketers", 
                    backgroundColor: ['#006B3C'],  
                    borderColor: '#006B3C',
                    fill: false, 
                    data: [@forelse($DPK_ID as $INDI) "{{$INDI / 1000000}}", @empty @endforelse],
                },            
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });

    var ctx = document.getElementById('atkChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_9 as $array_y)"{{$array_y}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "NNPC", 
                    backgroundColor: ['#007FFF'],  
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($ATK_NN as $NNPC) "{{$NNPC / 1000000}}", @empty @endforelse],
                },      
                {
                    label: "Major Marketers", 
                    backgroundColor: ['#6D351A'],  
                    borderColor: '#6D351A',
                    fill: false, 
                    data: [@forelse($ATK_MJ as $MAJOR) "{{$MAJOR / 1000000}}", @empty @endforelse],
                },       
                {
                    label: "Independent Marketers", 
                    backgroundColor: ['#006B3C'],  
                    borderColor: '#006B3C',
                    fill: false, 
                    data: [@forelse($ATK_ID as $INDI) "{{$INDI / 1000000}}", @empty @endforelse],
                },            
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });



    //Local vs Import CHARTS
    var ctx = document.getElementById('pmsLocalImportChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_10 as $array_y)"{{$array_y}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Import", 
                    backgroundColor: '#5D8AA8',  
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($pms_import_chart as $pms_import_charts) "{{$pms_import_charts / 1000000}}", @empty @endforelse],
                },      
                {
                    label: "Local", 
                    backgroundColor: '#006B3C',  
                    borderColor: '#6D351A',
                    fill: false, 
                    data: [@forelse($pms_local_chart as $pms_local_charts) "{{$pms_local_charts / 1000000}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });

    var ctx = document.getElementById('agoLocalImportChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_10 as $array_y)"{{$array_y}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Import", 
                    backgroundColor: '#5D8AA8',   
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($ago_import_chart as $ago_import_charts) "{{$ago_import_charts / 1000000}}", @empty @endforelse],
                },      
                {
                    label: "Local", 
                    backgroundColor: '#006B3C',   
                    borderColor: '#6D351A',
                    fill: false, 
                    data: [@forelse($ago_local_chart as $ago_local_charts) "{{$ago_local_charts / 1000000}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });

    var ctx = document.getElementById('dpkLocalImportChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_10 as $array_y)"{{$array_y}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Import", 
                    backgroundColor: '#5D8AA8',   
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($dpk_import_chart as $dpk_import_charts) "{{$dpk_import_charts / 1000000}}", @empty @endforelse],
                },      
                {
                    label: "Local", 
                    backgroundColor: '#006B3C',   
                    borderColor: '#6D351A',
                    fill: false, 
                    data: [@forelse($dpk_local_chart as $dpk_local_charts) "{{$dpk_local_charts / 1000000}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });



    var ctx = document.getElementById('prodStorageCapIndeChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($m_segments as $segment)@if($m_segment->id < 6) "{{$array_y}}", @endif @empty @endforelse],
            datasets: 
            [          
                {
                    label: "PMS", 
                    backgroundColor: '#007FFF',   
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($inde_pms_tot as $inde_pms) "{{$inde_pms / 1000000}}", @empty @endforelse],
                },          
                {
                    label: "DPK", 
                    backgroundColor: '#87A96B',   
                    borderColor: '#87A96B',
                    fill: false, 
                    data: [@forelse($inde_dpk_tot as $inde_dpk) "{{$inde_dpk / 1000000}}", @empty @endforelse],
                },         
                {
                    label: "AGO", 
                    backgroundColor: '#79443B',   
                    borderColor: '#79443B',
                    fill: false, 
                    data: [@forelse($inde_ago_tot as $inde_ago) "{{$inde_ago / 1000000}}", @empty @endforelse],
                },
           ]
        },

        // Configuration options go here
        options: optionsTransStacked
    });
    var ctx = document.getElementById('prodStorageCapMajoChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($m_segments as $segment)@if($m_segment->id < 6) "{{$array_y}}", @endif @empty @endforelse],
            datasets: 
            [    

                {
                    label: "PMS", 
                    backgroundColor: '#007FFF',   
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($maj_pms_tot as $major_pms) "{{$major_pms / 1000000}}", @empty @endforelse],
                },
                {
                    label: "DPK", 
                    backgroundColor: '#87A96B',   
                    borderColor: '#87A96B',
                    fill: false, 
                    data: [@forelse($maj_dpk_tot as $major_dpk) "{{$major_dpk / 1000000}}", @empty @endforelse],
                }, 
                {
                    label: "AGO", 
                    backgroundColor: '#79443B',   
                    borderColor: '#79443B',
                    fill: false, 
                    data: [@forelse($maj_ago_tot as $major_ago) "{{$major_ago / 1000000}}", @empty @endforelse],
                },              
           ]
        },

        // Configuration options go here
        options: optionsTransStacked
    });
    var ctx = document.getElementById('prodStorageCapMegaChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($m_segments as $segment)@if($m_segment->id < 6) "{{$array_y}}", @endif @empty @endforelse],
            datasets: 
            [       

                {
                    label: "PMS", 
                    backgroundColor: '#007FFF',   
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($mega_pms_tot as $mega_pms) "{{$mega_pms / 1000000}}", @empty @endforelse],
                }, 
                {
                    label: "DPK", 
                    backgroundColor: '#87A96B',   
                    borderColor: '#87A96B',
                    fill: false, 
                    data: [@forelse($mega_dpk_tot as $mega_dpk) "{{$mega_dpk / 1000000}}", @empty @endforelse],
                },  
                {
                    label: "AGO", 
                    backgroundColor: '#79443B',   
                    borderColor: '#79443B',
                    fill: false, 
                    data: [@forelse($mega_ago_tot as $mega_ago) "{{$mega_ago / 1000000}}", @empty @endforelse],
                },  
      
           ]
        },

        // Configuration options go here
        options: optionsTransStacked
    });
    var ctx = document.getElementById('prodStorageCapFranChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($m_segments as $segment)@if($m_segment->id < 6) "{{$array_y}}", @endif @empty @endforelse],
            datasets: 
            [   
                {
                    label: "PMS", 
                    backgroundColor: '#007FFF',   
                    borderColor: '#007FFF',
                    fill: false, 
                    data: [@forelse($fran_pms_tot as $fran_pms) "{{$fran_pms / 1000000}}", @empty @endforelse],
                }, 
                {
                    label: "DPK", 
                    backgroundColor: '#87A96B',   
                    borderColor: '#87A96B',
                    fill: false, 
                    data: [@forelse($fran_dpk_tot as $fran_dpk) "{{$fran_dpk / 1000000}}", @empty @endforelse],
                },  
                {
                    label: "AGO", 
                    backgroundColor: '#79443B',   
                    borderColor: '#79443B',
                    fill: false, 
                    data: [@forelse($fran_ago_tot as $fran_ago) "{{$fran_ago / 1000000}}", @empty @endforelse],
                },              
           ]
        },

        // Configuration options go here
        options: optionsTransStacked
    });



    var ctx = document.getElementById('LPGConsumptionChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @forelse($array_year_5 as $year) "{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "LPG Consumption in Country (MT)", 
                    backgroundColor: '#007BA7',   
                    borderColor: '#007BA7',
                    fill: false, 
                    data: [@if(count($lpg_charts)>0) @foreach($lpg_charts as $lpg) "{{$lpg}}", @endforeach @endif],
                },               
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });
     


    // HSE ACCIDENT UPSTREAM
    var ctx = document.getElementById('accupPieChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($month_arr)>0) @foreach($month_arr as $month_array)"{{$month_array}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Upstream Accident - Incidents", 
                    backgroundColor: '#00FF6F',  
                    borderColor: '#ffffff',
                    data: [@if(count($acc_up_chart)>0) @foreach($acc_up_chart as $acc_up_charts) "{{$acc_up_charts->incidents}}", @endforeach @endif],
                },       
                {
                    label: "Upstream Accident - Fatality", 
                    backgroundColor: '#FFA812',  
                    borderColor: '#ffffff',
                    data: [@if(count($acc_up_chart)>0) @foreach($acc_up_chart as $acc_up_charts) "{{$acc_up_charts->fatality}}", @endforeach @endif],
                },          
           ]
        },

        // Configuration options go here
        options: optionsTrans
    }); 

    var ctx = document.getElementById('accdwLineChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($month_arr as $month_array)"{{$month_array}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Downstream - Fatal Incidents", 
                    backgroundColor: '#007FFF',  
                    borderColor: '#ffffff',
                    data: [@forelse($acc_dw_chart as $acc_dw_charts) "{{$acc_dw_charts->fatal_incident}}", @empty @endforelse],
                },       
                {
                    label: "Downstream - Non Fatal Incidents", 
                    backgroundColor: '#F0E130',  
                    borderColor: '#ffffff',
                    data: [@forelse($acc_dw_chart as $acc_dw_charts) "{{$acc_dw_charts->non_fatal_incident}}", @empty @endforelse],
                },          
           ]
        },

        // Configuration options go here
        options:optionsTrans
    }); 
</script>