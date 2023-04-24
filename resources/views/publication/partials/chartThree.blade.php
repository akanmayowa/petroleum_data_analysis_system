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



	 //ave Price
    var ctx = document.getElementById('avePriceLineChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset    
        data: 
        {
            labels: [@forelse($Priceyears as $year)"{{$year}}", @empty @endforelse],
            datasets: 
            [          
                {
                    label: "Agbami", 
                    backgroundColor: ['#008000'],  
                    borderColor: '#008000',
                    fill: false,
                    data: [@forelse($str_price_2 as $str_p_2) "{{$str_p_2}}", @empty @endforelse ],
                },      
                {
                    label: "Akpo", 
                    backgroundColor: ['#2F4F4F'],  
                    borderColor: '#2F4F4F',
                    fill: false,
                    data: [@forelse($str_price_11 as $str_p_11) "{{$str_p_11}}", @empty @endforelse ],
                },         
                {
                    label: "Bonga", 
                    backgroundColor: ['#5D8AA8'],  
                    borderColor: '#5D8AA8',
                    fill: false,
                    data: [@forelse($str_price_13 as $str_p_13) "{{$str_p_13}}", @empty @endforelse ],
                },
                {
                    label: "Bonny", 
                    backgroundColor: ['#6495ED'],  
                    borderColor: '#6495ED',
                    fill: false,
                    data: [@forelse($str_price_6 as $str_p_6) "{{$str_p_6}}", @empty @endforelse ],
                },        
                {
                    label: "Brass", 
                    backgroundColor: ['#D73B3E'],  
                    borderColor: '#D73B3E',
                    fill: false,
                    data: [@forelse($str_price_8 as $str_p_8) "{{$str_p_8}}", @empty @endforelse ],
                },      
                {
                    label: "Forcados", 
                    backgroundColor: ['#BDB76B'],  
                    borderColor: '#BDB76B',
                    fill: false,
                    data: [@forelse($str_price_9 as $str_p_9) "{{$str_p_9}}", @empty @endforelse ],
                },      
                {
                    label: "Qua Iboe", 
                    backgroundColor: ['#FFA812'],  
                    borderColor: '#FFA812',
                    fill: false,
                    data: [@forelse($str_price_10 as $str_p_10) "{{$str_p_10}}", @empty @endforelse ],
                },        
                {
                    label: "Usan", 
                    backgroundColor: ['#007BA7'],  
                    borderColor: '#007BA7',
                    fill: false,
                    data: [@forelse($str_price_29 as $str_p_29) "{{$str_p_29}}", @empty @endforelse ],
                },          
           ]
        },

        // Configuration options go here
        options: optionsStartAtZero
    });


    var ctx = document.getElementById('percByRefChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: 
        {
            labels: [ @if(count($RefchartYear)>0) @foreach($RefchartYear as $year)"{{$year}}", @endforeach @endif],
            datasets: 
            [          
                {
                    label: "KRPC", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#FF0800',
                    data: [@if(isset($krpc_per)) @foreach($krpc_per as $kaduna) "{{$kaduna}}", @endforeach @endif],
                },        
                {
                    label: "PHRC (New)", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#36454F',
                    data: [@if(isset($pnew_per)) @foreach($pnew_per as $port_new) "{{$port_new}}", @endforeach @endif],
                },      
                {
                    label: "PHRC (Old)", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#007FFF',
                    data: [@if(isset($pold_per)) @foreach($pold_per as $port_old) "{{$port_old}}", @endforeach @endif],
                },       
                {
                    label: "WRPC", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#FFBF00',
                    data: [@if(isset($wrpc_per)) @foreach($wrpc_per as $warri) "{{$warri}}", @endforeach @endif],
                },     
                {
                    label: "NDPR", 
                    // backgroundColor: ['#007FFF'],  
                    borderColor: '#92A1CF',
                    data: [@if(isset($ndpr_per)) @foreach($ndpr_per as $niger_delta) "{{$niger_delta}}", @endforeach @endif],
                },      
           ]
        },

        // Configuration options go here
        options: optionsTrans
    });
</script>