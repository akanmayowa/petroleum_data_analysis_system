

<canvas id="allChart"></canvas> 
            






<script type="text/javascript">
    var ctx = document.getElementById('allChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: 
        {
            labels: ["OPL Blocks Allocated", "OML Blocks Allocated", "Blocks Open"],
            datasets: 
            [          
                {
                    label: "Blocks", 
                    backgroundColor: [@for($i = 1; $i <= 3; $i++) 'rgb('+Math.floor((Math.random() * 130) + 30)+','+Math.floor((Math.random() * 150) + 1)+', '+Math.floor((Math.random() * 190) + 50)+')', @endfor],
                    borderColor: '#ffffff',
                    data: [@if($all_block)"{{$all_block->opl_blocks_allocated}}", "{{$all_block->oml_blocks_allocated}}", "{{$all_block->blocks_open}}" @endif],
                },           
           ]
        },

        // Configuration options go here
        options: {}
    });
</script>












