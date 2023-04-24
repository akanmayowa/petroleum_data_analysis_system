

<canvas id="blockChart"></canvas> 
            



<script type="text/javascript">
    var ctx = document.getElementById('blockChart').getContext('2d');
    var chart = new Chart(ctx, 
    {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: 
        {
            labels: [ @foreach($blocks as $block)"{{$block->terrain->terrain_name}}", @endforeach],
            datasets: 
            [          
                {
                    label: "Blocks", 
                    backgroundColor: [@foreach($blocks as $block) 'rgb('+Math.floor((Math.random() * 130) + 30)+','+Math.floor((Math.random() * 150) + 1)+', '+Math.floor((Math.random() * 190) + 50)+')', @endforeach],
                    borderColor: '#ffffff',
                    data: [@foreach($blocks as $block) "{{$block->total_block}}", @endforeach],
                },           
           ]
        },

        // Configuration options go here
        options: {}
    });
</script>














