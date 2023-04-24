@extends('layouts.app')

@section('content')







<div class="row">
	<div class="col-md-1"> </div>
   <div class="col-md-10 col-md-offset-1 card m-b-30">
       <div class="panel panel-default">
           <div class="panel-heading"><b>Charts</b></div>
           <div class="panel-body">
               <canvas id="projects_graph" width="1000" height="400"></canvas>
           </div>
       </div>
   </div>
   <div class="col-md-1"> </div>
 </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
 <script>
        $(function()
        {
          $.getJSON("/projects/chart/data", function (result) 
          {

            var labels = [],data=[];
            for (var i = 0; i < result.length; i++) 
            {
                labels.push(result[i].month);
                data.push(result[i].projects);
            }

            var buyerData = 
            {
              labels : labels,
              datasets : 
              [
                {
                  fillColor : "rgba(240, 127, 110, 0.3)",
                  strokeColor : "#f56954",
                  pointColor : "#A62121",
                  pointStrokeColor : "#741F1F",
                  data : data
                }
              ]
            };
            var buyers = document.getElementById('projects_graph').getContext('2d');
            
            new Chart(buyers).Line(buyerData, 
            {
              bezierCurve : true
            });
          });

      });
</script>



@endsection