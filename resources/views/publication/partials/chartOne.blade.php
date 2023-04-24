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

 var optionsNoLegend = 
 {
    tooltips: { enabled: true },
    plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: 'transparent', }  },
    legend: { display: false }
 };



    //OML
    var ctx = document.getElementById('omlPieChart').getContext('2d');
    Chart.defaults.global.color = '#fff';
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',
        scaleFontColor: 'white',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($concession_contract_legend as $oml_contracts)"{{$oml_contracts->contract_name}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "OML Concession By Contract", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@forelse($omlContract as $oml) "{{($oml)}}", @empty @endforelse],
                },           
           ]
        },
        options: optionsPerc
    });

    //OML BY TERRAIN
    var ctx = document.getElementById('omlTBarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($oml_terrains as $oml_terrain)"{{substr($oml_terrain->short_name, 0, 16)}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Concession By Terrain (OML)", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@forelse($omlTerrContract as $oml_conc_terr) "{{$oml_conc_terr}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
       options: optionsData
    });


    //OPL
    var ctx = document.getElementById('oplPieChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [ @forelse($concession_contract_legend as $contract)"{{$contract->contract_name}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "OPL Concession By Contrat", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@forelse($oplContract as $opl) "{{($opl)}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsPerc
    });


    //OPL BY TERRAINS
    var ctx = document.getElementById('oplTBarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($opl_terrains as $conc_terrain)"{{substr($conc_terrain->short_name, 0, 16)}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@forelse($oplTerrContract as $conc_terr) "{{$conc_terr}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsData
    });


    //All Concession 
    var ctx = document.getElementById('concessionChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [ @forelse($contracts as $contract)"{{$contract->contract_name}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "OPL Concession By Contrat", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@forelse($oml_opl_concession as $concession) "{{($concession)}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsPerc
    });

   
    //Reserve
    var ctx = document.getElementById('reserveOilLineChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($array_year_10)>0) @foreach($array_year_10 as $year)"{{$year}}", @endforeach @endif ],
            datasets: 
            [          
                {
                    label: "Oil Reserves - MMB", 
                    backgroundColor: ['#77c949'],  /* , '#FFC1CC', '#ffbb44', '#C2B280', '#8E4585' */
                    borderColor: '#77c949',
                    fill: false, 
                    data: [@if(count($oil_total)>0) @foreach($oil_total as $chart) "{{$chart}}", @endforeach @endif],
                },         
                {
                    label: "Condensate Reserves - MMB", 
                    backgroundColor: ['#FFC1CC'],  /* , '#FFC1CC', '#ffbb44', '#C2B280', '#8E4585' */
                    borderColor: '#FFC1CC',
                    fill: false, 
                    data: [@if(count($condensate_total)>0) @foreach($condensate_total as $chart) "{{$chart}}", @endforeach @endif],
                },           
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });


    //OIL CONDENSATE RESERVE BY CONTRACT & TERRAIN CHART    
    var ctx = document.getElementById('reserveContractChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($contract_2to5)>0) @foreach($contract_2to5 as $contract) "{{$contract->contract_name}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Reserves by Contract", 
                    backgroundColor: ['#CD7F32', '#202020', '#BF94E4', '#f32f53', '#67a8e4', '#77c949'],  /* , '#FFC1CC', '#ffbb44', '#C2B280', '#8E4585' */
                    borderColor: '#ffffff',
                    data: {!! json_encode(array_values($resCount)) !!},
                },             
           ]
        },

        // Configuration options go here
        options: optionsPerc
    });


    var ctx = document.getElementById('reserveTerrChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($total_terrains as $total_terrain) "{{$total_terrain->terrain_name}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Reserves by Terrain", 
                    backgroundColor: ['#FFC1CC', '#C2B280', '#ffbb44', '#008b8b', 'FBCEB1'], 
                    borderColor: '#ffffff',
                    data: {!! json_encode(array_values($totResByTerr)) !!},
                },             
           ]
        },

        // Configuration options go here
        options: optionsPerc
    });




    var ctx = document.getElementById('reserveReplaceRateChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($rrr_contract_legend as $contract) "{{$contract->contract_name}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Reserves Replacement Rate", 
                    backgroundColor: ['#008b8b', '#6495ED', '#FF9966', '#848482', '#00CC99'],
                    borderColor: '#ffffff',
                    data: [@forelse($rate_CHART as $rrr) "{{$rrr}}", @empty @endforelse],
                },
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });

    // var ctx = document.getElementById('reserveNetAdditionChart').getContext('2d');
    // var chart = new Chart(ctx,
    //     {
    //         // The type of chart we want to create
    //         type: 'doughnut',

    //         // The data for our dataset
    //         data:
    //             {
    //                 labels: [@forelse($contracts as $contract) "{{$contract->contract_name}}", @empty @endforelse],
    //                 datasets:
    //                     [
    //                         {
    //                             label: "Reserves Net Addition",
    //                             backgroundColor: ['#008b8b', '#6495ED', '#FF9966', '#848482', '#00CC99'],
    //                             borderColor: '#ffffff',
    //                             data: [@forelse($NET_ADD_CHART as $net_addition) "{{$net_addition}}", @empty @endforelse],
    //                         },
    //                     ]
    //             },

    //         // Configuration options go here
    //         options: optionsData
    //     });


    var ctx = document.getElementById('yearlyRRRChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($price_legend as $year) "{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Production Rate",  
                    borderColor: '#5D8AA8',
                    data: [@forelse($prodArr as $prodt) "{{$prodt}}", @empty @endforelse],
                },           
                {
                    label: "Net Addition", 
                    borderColor: '#007FFF',
                    // fill:false,
                    data: [@forelse($NET_TOT as $net_add) "{{$net_add}}", @empty @endforelse],
                },         
                {
                    label: "Replacement Rate",  
                    borderColor: '#DE5D83',
                    // fill:false,
                    data: [@forelse($rateArr as $rrr) "{{$rrr}}", @empty @endforelse],
                },             
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });


    var ctx = document.getElementById('naturalGasreserveBarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($reserve_year as $year) "{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Total Gas Reserve as at 1-Jan-{{$yrs}} vs {{$yrs+1}} (TCF)", 
                    backgroundColor: ['#318CE7', '#FF9966', '#318CE7'],
                    borderColor: '#ffffff',
                    data: [@forelse($reserve_total_chart as $res_total_chart) "{{($res_total_chart / 1000)}}", @empty @endforelse],
                },            
           ]
        }, 

        // Configuration options go here
        options: optionsNoLegend
    });

    var ctx = document.getElementById('naturalGasreserveLineChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($price_legend)>0) @foreach($price_legend as $year) "{{$year}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "Associated Gas, AG (TCF)", 
                    backgroundColor: '#D2691E',
                    borderColor: '#ffffff',
                    data: [@if(count($ag_year)>0) @forelse($ag_year as $agYear) "{{($agYear / 1000)}}", @empty @endforelse @endif],
                },        
                {
                    label: "Non Associated Gas, NAG (TCF)", 
                    backgroundColor: '#4B5320',
                    borderColor: '#ffffff',
                    data: [@if(count($nag_year)>0) @forelse($nag_year as $nagYear) "{{($nagYear / 1000)}}", @empty @endforelse @endif],
                },        
                {
                    label: "Total Gas (TCF)", 
                    backgroundColor: '#1560BD',
                    borderColor: '#1560BD', 
                    fill: false, 
                    data: [@if(count($ag_nag)>0) @forelse($ag_nag as $totalYear) "{{($totalYear / 1000)}}", @empty @endforelse @endif],
                    type: 'line'
                },            
            ]
        }, 

        // Configuration options go here
        options: optionsTrans
    });



</script>