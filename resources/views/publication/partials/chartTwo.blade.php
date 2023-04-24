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

 var optionsTransHorizontalBar = 
 {
    tooltips: { enabled: true,  indexAxis: 'y', },
    plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: 'transparent', }  }
 };


 var optionsStartAtZero = 
 {
    tooltips: { enabled: true },
    plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: 'transparent', }  },
    scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
 };

 var optionsNoLegend = 
 {
    tooltips: { enabled: true },
    plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: 'transparent', }  },
    legend: { display: false }
 };

 var optionsStartAtZeroNoLegend = 
 {
    tooltips: { enabled: true },
    plugins: {  precision: 0, datalabels: { formatter: (value, ctx) => {  return value;  },     color: 'transparent', }  },
    scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
    legend: { display: false }
 };

    



    //FIELD DEVELOPMENT PLAN
    


    //CRUDE PRODUCTION
    var ctx = document.getElementById('oilCondProdByCompanyBarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'horizontalBar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($prov_companies as $company)"{{$company->company?$company->company->company_name:''}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Production in (Million Barrels) on Company Basis",
                    backgroundColor: '#007FFF',  /*  */
                    borderColor: '#ffffff',
                    data: [@forelse($comp_prod_arr as $production)"{{($production / 1000000)}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsTransHorizontalBar
    });

    //CRUDE PRODUCTION
    var ctx = document.getElementById('monthlyProductionBarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($m_arr as $month)"{{$month}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Provisional Production (MBopd)",
                    backgroundColor: ['#202020', '#BF94E4', '#4B5320', '#79443B', '#08E8DE', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E', '#67a8e4', '#ffbb44'],  /* '#77c949', '#f32f53'*/
                    borderColor: '#ffffff',
                    data: [@forelse($monthlyProvChart as $monthlyProduction) "{{($monthlyProduction / 1000000)}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsNoLegend
    });



    //Provisional Crude Production By Percent 
    @if($controllerName->provisionalCrudeProd($yrs, 'company_total'))
    var ctx = document.getElementById('percProdPieChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($perc_prod as $contract)"{{$contract}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Percentage By Contract", 
                    backgroundColor: ['#5D8AA8', '#4B5320', '#79443B', '#08E8DE', '#FF7F50', '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4'],  /*  */
                    borderColor: '#ffffff',
                    data: [@forelse($perc_array as $prodByContract)"{{$prodByContract}}", @empty @endforelse],
                },               
           ]
        },

        // Configuration options go here
        options: optionsPerc
    });
    @endif



    //Stabilized Crude Oil Vs Condensates
    var ctx = document.getElementById('oilCondLineChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($oil_crude_legends as $oil_crude_legend)"{{$oil_crude_legend}}", @empty @endforelse],
            datasets: 
            [            
                {
                    label: "Total Crude Production (MMBbls)", 
                    backgroundColor: '#006B3C', 
                    borderColor: '#006B3C',
                    fill: false,
                    data: [@forelse($crud_oil_array as $crud_oil_arr)"{{$crud_oil_arr / 1000000}}", @empty @endforelse],
                },     
                {
                    label: "Total Condensate Production (MMBbls)", 
                    backgroundColor: '#2A52BE', 
                    borderColor: '#2A52BE',
                    fill: false,
                    data: [@forelse($crud_PF_cond_array as $crud_PF_cond_arr)"{{$crud_PF_cond_arr / 1000000}}", @empty @endforelse],
                },         
                {
                    label: "Total Oil + Condensate Production (MMBbls)", 
                    backgroundColor: '#964B00', 
                    borderColor: '#964B00',
                    fill: false,
                    data: [@forelse($tot_cru_array as $total)"{{$total / 1000000}}", @empty @endforelse],
                    type: 'line'
                },              
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });


    // AG NAG GAS PRODUCTION CHART
    var ctx = document.getElementById('AgNagBarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: [@foreach($ArrayYear as $year) "{{$year}}", @endforeach],
            datasets: 
            [        
                {
                    label: "Associated Gas (MMSCF)", 
                    backgroundColor: '#006B3C', 
                    borderColor: '#ffffff',
                    data: [@forelse($tot_AG_yrs as $AG) "{{($AG / 1000000)}}", @empty @endforelse],
                },    
                {
                    label: "Non Associated Gas (MMSCF)", 
                    backgroundColor: '#FF9966', 
                    borderColor: '#ffffff',
                    data: [ @forelse($tot_NAG_yrs as $NAG) "{{($NAG / 1000000)}}", @empty @endforelse],
                },            
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });


    var ctx = document.getElementById('gasUtilFactorPieChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($gas_util_legend as $legend)"{{$legend}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Gas Utilization Breakdown", 
                    backgroundColor: ['#202020', '#BF94E4', '#CD7F32', '#f32f53', '#67a8e4', '#5D8AA8', '#85BB65', '#FF7F50', '#FC8EAC', '#FCF75E'],  /* '#77c949', '#FFC1CC', '#ffbb44', '#f32f53', '#67a8e4' */
                    borderColor: '#ffffff',
                    data: [@forelse($gas_breakdown as $breakdown) "{{number_format($breakdown, 0)}}", @empty @endforelse],
                },           
           ]
        },

        // Configuration options go here
        options: optionsPerc
    });


    var ctx = document.getElementById('AgFlaredChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_10 as $year)"{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Yearly Gas Flared", 
                    backgroundColor: 'red',     //007FFF
                    borderColor: '#ffffff',
                    data: [@forelse($gflaredChart as $flared) "{{$flared}}", @empty @endforelse],
                },            
           ]
        },

        // Configuration options go here
        options: optionsStartAtZeroNoLegend
    });



    var ctx = document.getElementById('gasProdUtilFlarChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [@forelse($array_year_10 as $year)"{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Yearly Gas Utilized", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#92A1CF',
                    data: [@forelse($gasProdChart as $produced) "{{($produced / 10000000)}}", @empty @endforelse],
                },        
                {
                    label: "Yearly Gas Produced", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#006B3C',
                    data: [@forelse($gasUtilChart as $utilized) "{{($utilized / 10000000)}}", @empty @endforelse],
                },      
                {
                    label: "Yearly Gas Flared", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#FF0800',
                    data: [@forelse($gasFlarChart as $flared) "{{($flared / 10000000)}}", @empty @endforelse],
                },          
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });

</script>

